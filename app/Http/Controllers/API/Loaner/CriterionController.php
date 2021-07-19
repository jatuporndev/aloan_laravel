<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criterion;
use DB;

class CriterionController extends Controller
{
    public function create(Request $request,$id)
    {
        //add user data into users table
        $borrowerlist = new Criterion();
        $borrowerlist->	Age_range = $request->get('Age_range');
        $borrowerlist->Saraly_range = $request->get('Saraly_range');      
        $borrowerlist->Married = $request->get('Married');   
        $borrowerlist->money_max = $request->get('money_max');   
        $borrowerlist->borrowlistID  = $id;

         
        $borrowerlist->save();                
        return response()->json(array(
            'message' => 'add a borrowerlist successfully', 
            'status' => 'true'));  
    }

    public function index(Request $request,$id)
    { 
        $criterionID = $request->get('criterionID');
        $sql="SELECT *  FROM criterion WHERE borrowlistID =$id";
        
        if($criterionID != ""){
            $sql.=" AND criterionID = $criterionID";
        }
        
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function delete($id)
    { 
        $sql="DELETE FROM criterion WHERE criterionID=$id";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function check(Request $request)
    {
        $borrowlistID = $request->get('borrowlistID');
        $Age_range = $request->get('Age_range');
        $Saraly_range = $request->get('Saraly_range');
        $Married = $request->get('Married');

        $sql="SELECT * FROM criterion WHERE borrowlistID =$borrowlistID AND
        Age_range =$Age_range AND Saraly_range=$Saraly_range AND Married=$Married";
      
        $recount=DB::select($sql)[0];    
        return response()->json($recount);
    }

    public function view($criterionID)
    { 
        $sql="SELECT * FROM criterion WHERE criterionID=$criterionID";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }

    public function update(Request $request, $id)
    {       
        $Criterion = Criterion::find($id);     
        $Criterion->instullment_max = $request->get('instullment_max');    
        $Criterion->money_max = $request->get('money_max');
        $Criterion->interest = $request->get('interest');
        $Criterion->edit = 1;
      
   
        $Criterion->save();

        return response()->json(array(
            'message' => 'update a user successfully', 
            'status' => 'true'));
    }

    public function insertCri($borrowlistID)
    { 
        $sql="SELECT * FROM borrowlist WHERE borrowlistID =$borrowlistID";
        $dataBorrowlist=DB::select($sql)[0];  
        $money_max = $dataBorrowlist->money_max;
        $instullment_max = $dataBorrowlist->instullment_max;
        $interest = $dataBorrowlist->interest;

        $sql="INSERT INTO criterion
             ( Age_range, Saraly_range, Married,borrowlistID,money_max,instullment_max,interest)
        VALUES
          (0, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest), 
          (2, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest), 
          (3, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),

          (0, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest), 
          (1, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest), 
          (2, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest)";

       // $sql="SELECT *  FROM criterion WHERE borrowlistID =$id";
        $recount=DB::select($sql);         
        return response()->json($recount);
        
    }
}
