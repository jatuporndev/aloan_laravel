<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Borrowers;
use Illuminate\Support\Facades\Auth;
use DB;

class BorrowerController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');

        if(Auth::guard('borrower')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            $users = Borrower::data($email);
            $user = (array)$users;
            $user['message'] = 'success';
            $user['status'] = 'true';    
            //$user['token'] = sha1($username . $password . "@%#XYaU12$");        
        }else{
            $user = array(
                'message' => 'this user is not found', 
                'status' => 'false');
        }

        return response()->json($user);
    }

    public function create(Request $request)
    {
        $emailBorrowers =$request->get('email');
        $sqlBorrowers="SELECT * FROM Borrowers WHERE email = '$emailBorrowers' AND (verify =0 OR verify =1) ";
        $dataBorrowers = DB::select($sqlBorrowers);

        if(!empty($dataBorrowers)){

            return response()->json(array());  

        }else{
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
        $this->validate($request, ['filePro' => 'image']);
        $this->validate($request, ['fileVe' => 'image']);
        $this->validate($request, ['filecard' => 'image']);
       // $this->validate($request, ['filesig' => 'image']);

        //upload file
        $imagePro = "";        
        $filePro = $request->file('filePro');
        if(isset($filePro)){
            $filePro->move('assets/uploadfile/Borrower/profile',$filePro->getClientOriginalName());
            $imagePro = $filePro->getClientOriginalName();
        }   
        
        $imageVerify = "";        
        $fileVe = $request->file('fileVe');
        if(isset($fileVe)){
            $fileVe->move('assets/uploadfile/Borrower/imageVetify',$fileVe->getClientOriginalName());
            $imageVerify = $fileVe->getClientOriginalName();
        }  
        $image_IDCard = "";        
        $filecard = $request->file('filecard');
        if(isset($filecard)){
            $filecard->move('assets/uploadfile/Borrower/cardimage',$filecard->getClientOriginalName());
            $image_IDCard = $filecard->getClientOriginalName();
        }  
       // $signature = "";        
       // $filesig = $request->file('filesig');
       // if(isset($filecard)){
       //     $filesig->move('assets/uploadfile/Borrower/signature',$filesig->getClientOriginalName());
       //     $signature = $filesig->getClientOriginalName();
       // }
        
        //add user data into users table
        $user = new Borrowers();
        $user->firstname= $request->get('FirstName');
        $user->lastname = $request->get('LastName');        
        $user->phone = $request->get('Phone');
        $user->address = $request->get('adress');
        $user->gender = $request->get('Gender');
        $user->birthday = $request->get('Brithday');
        $user->password =  \Hash::make($request->Password);
        $user->email = $request->get('email');
        $user->IDCard = $request->get('IDCard');
        $user->IDBank = $request->get('IDBank');
        $user->bank = $request->get('Bank');
        $user->job = $request->get('Job');
        $user->IDCard_back = $request->get('IDCard_back');
        //$user->IDCard_back = $request->get('IDCard_back');
        $user->LineID = $request->get('LineID');
        $user->salary = $request->get('Salary');
        $user->married = $request->get('Married');
        
       // $user->imageProfile= $imagePro;  
        $user->image_face = $imageVerify;  
        $user->Image_IDCard = $image_IDCard;   
        //$user->signature = $signature;              
        $user->save();                
        return response()->json(array(
            'message' => 'add a user successfully', 
            'status' => 'true'));  
        }
    }
    public function index($BorrowerID)
    { 
        $sql="SELECT * FROM borrowers WHERE BorrowerID = $BorrowerID " ;
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }
    public function update(Request $request, $id)
    {       
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
        $type = $request->get('typeUpdate');
        if($type=="profile"){
            $this->validate($request, ['imageProfile' => 'image']);
            $user = Borrower::find($id);     
            $user->phone = $request->get('Phone');    
            $user->address = $request->get('Adress');
            $user->email = $request->get('email');
            $user->LineID = $request->get('LineID');
            $user->salary = $request->get('Salary');
            $user->married = $request->get('Married');
            $user->job = $request->get('Job');
        }
        if($type=="bank"){
            $user = Borrower::find($id);   
            $user->bank = $request->get('Bank');
            $user->IDBank = $request->get('IDBank');
        }
   
     

        $file = $request->file('imageProfile');
        if(isset($file)){
            $file->move('assets/uploadfile/Borrower/profile',$file->getClientOriginalName());
            $user->imageProfile = $file->getClientOriginalName();
        }        

        $user->save();

        return response()->json(array(
            'message' => 'update a user successfully', 
            'status' => 'true'));
    }
}