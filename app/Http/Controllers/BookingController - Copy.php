<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Copy;
use Carbon\Carbon;
class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books = Book::all();
       return view('homepage.index', compact('books'));
    }
    public function create($id)
    {
           $book = Book::find($id);
           return view('booking.register', compact('book'));
    }
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
        /*    'title' => 'required|string|255',*/
            'start_date' => 'required',
            'duration' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('booking/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $start_date = Carbon::parse(date_format(date_create($request->start_date),'Y-m-d H:i:s'));
        $end_date = Carbon::parse(date_format(date_create($request->start_date),'Y-m-d H:i:s'));
        $end_date->addSeconds($request->duration);

        $i=0;
        $table_size = Copy::count();
        do{
            $i++;
            $copy=DB::table('copies')->where ('id','=', $i)
                                    ->where ('book_id','=', $request->book_id)
                                    ->where('conservation','=','Bom')
                                    ->get()->first();

            $num=DB::table('Bookings')->where('copy_id', '=',$copy->id)
                                      ->where('status','=','reservado')->count();

            if($num>0){ 
              $j=0; 
              $btable_size = Booking::count();
              $flag=0;                        
              do{
                $j++;
                $booking=DB::table('Bookings')->where ('id','=', $j)
                                              ->where('copy_id', '=',$copy->id)
                                              ->where('status','=','reservado')->get()->first();
                if (isset($booking)){
                  if(($start_date < $booking->start_date & $end_date <= $booking->start_date) or $start_date >= $booking->end_date){
                    $copy_id= $copy->id;
                  }
                  else{
                    $flag=1;  
                  }   
                } 
              } while (($flag==0) or ($j == $btable_size+1));         
            }
            else {
              $copy_id= $copy->id;
            }

        }while (($num<>0 ) or ($i == $table_size+1)); 
            
        $randomString = str_random(25);

        $subscribe        = new Booking;
        //$subscribe->cod_booking = $request->cod_booking;
        $subscribe->start_date = $start_date;
        $subscribe->end_date = $end_date;
        $subscribe->user_id = 1;
        $subscribe->cod_booking = $randomString;
        $subscribe->copy_id =  $copy_id;
        $subscribe->status = 'reservado';
        $subscribe->save();
         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('homepage')->with('message','Rsereva efectuada com sucesso!');
    }
}