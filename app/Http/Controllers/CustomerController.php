<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PhpOffice\PhpSpreadsheet\IOFactory;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt'
        ]);
    
        $file = $request->file('file');
        $filePath = $file->getPathname();
        $fileExtension = $file->getClientOriginalExtension();
    
        // If the file is in Excel format (xlsx), convert it to CSV
        if ($fileExtension === 'xlsx') {
            $spreadsheet = IOFactory::load($filePath);
            $writer = IOFactory::createWriter($spreadsheet, 'Csv');
            $csvPath = storage_path('app/temp_import.csv'); // Temporary CSV file path
            $writer->save($csvPath);
            $filePath = $csvPath; // Use converted CSV path
        }
    
        // Open the CSV file
        $handle = fopen($filePath, "r");
        $header = true;
        
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            if ($header) { // Skip the first row (header)
                $header = false;
                continue;
            }
    
            DB::table('customers')->insert([
                'first_name' => $row[0] ?? null,
                'last_name' => $row[1] ?? null,
                'on_portal' => $row[2] ?? null,
                'email_address' => $row[3] ?? null,
                'gdc_number' => $row[4] ?? null,
                'course_date' => $row[6] ?? null,
                'status' => $row[7] ?? null,
                'contact' => $row[8] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    
        fclose($handle);
    
        return back()->with('success', 'File uploaded and data stored successfully!');
    }


    public function store_two(Request $request)
    {  
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv,txt'
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $csvFilePath = storage_path('app/temp_file.csv');

        // Convert Excel to CSV if needed
        if (in_array($extension, ['xlsx', 'xls'])) {
            $spreadsheet = IOFactory::load($file->getPathname());
            $writer = IOFactory::createWriter($spreadsheet, 'Csv');
            $writer->setDelimiter(','); // Ensure CSV format
            $writer->save($csvFilePath);
            $csvFile = fopen($csvFilePath, 'r');
        } else {
            $csvFile = fopen($file->getPathname(), "r");
        }

        $header = true;
        while (($row = fgetcsv($csvFile, 1000, ",")) !== false) {
            if ($header) { 
                $header = false;
                continue;
            }

            if (!isset($row[0]) || empty(trim($row[0]))) {
                continue; // Skip invalid rows
            }

            // Check if GDC Number exists
            $customer = DB::table('customers')->where('gdc_number', trim($row[0]))->first();

            if ($customer) {
                DB::table('customers')
                    ->where('gdc_number', trim($row[0]))
                    ->update([
                        'design'    => $row[1] ?? null,
                        'refine'    => $row[2] ?? null,
                        'direct'    => $row[3] ?? null,
                        'inDirect'  => $row[4] ?? null,
                        'styloso'   => $row[5] ?? null,
                        'flo'       => $row[6] ?? null,
                        'align'     => $row[7] ?? null,
                        'solo'      => $row[8] ?? null,
                        'updated_at' => now()
                    ]);
            }
        }

        fclose($csvFile);
        if (file_exists($csvFilePath)) {
            unlink($csvFilePath); // Delete temp CSV file after processing
        }

        return back()->with('success', 'File uploaded, converted (if needed), and data updated successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->gdc_number = $request->gdc_number;
        $customer->course_date = $request->course_date;
        $customer->email_address = $request->email_address;
        $customer->on_portal = $request->on_portal;
        $customer->design = $request->design;
        $customer->refine = $request->refine;
        $customer->direct = $request->direct;
        $customer->inDirect = $request->inDirect;
        $customer->styloso = $request->styloso;
        $customer->flo = $request->flo;
        $customer->solo = $request->solo;
        $customer->align = $request->align;
        $customer->follow_up = $request->follow_up;
        $customer->status = $request->status;
        $customer->save();
        return redirect()->back();
    }
    public function getFollowUps()
    {
    
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
            return redirect()->back()->with('success', 'Customer deleted successfully!');
        }
    
        return redirect()->back()->with('error', 'Customer not found!');
    }

    public function status($id) {
        $status = Customer::find($id);
    
        if ($status) {

            if ($status->status == 'Complete') {
                $status->status = 'Incomplete';
            } 
            elseif($status->status == 'Incomplete'){
                
                
                $status->status = 'Complete';
               
            }
            else {
                
                $status->status = 'Incomplete';
            }
    
            $status->save();
    
            return redirect()->back()->with('success', 'Status updated successfully!');
        }
    
        return redirect()->back()->with('error', 'Customer not found!');
    }
    
}
