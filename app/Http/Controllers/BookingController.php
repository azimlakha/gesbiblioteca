<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Booking;
use Carbon\Carbon;
use App\User;

class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $user = User::find(Auth::user()->id);
           return view('booking.index', compact('user'));
    }
    
/*    public function ExistCopy($id)
    {
          $copy=DB::table('copies')->where ('book_id','=', $id)
                                   ->where('conservation','=','Bom')
                                   ->get();
          return $copy;
    }
*/
    public function search(Request $request)
    {
          $bookings = Booking::where('start_date','like', '%'.$request->date.'%')
                        ->whereHas('user', function ($query) use ($request){
                  $query->where('name', 'like', '%'.$request->name.'%');
          })->get();

           return view('admin.bookings', compact('bookings'));
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
            'start_date' => 'required|date|after:today',
            'duration' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('booking/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user_id = Auth::user()->id;
        $start_date = Carbon::parse(date_format(date_create($request->start_date),'Y-m-d H:i:s'));
        $end_date = Carbon::parse(date_format(date_create($request->start_date),'Y-m-d H:i:s'));
        $end_date->addSeconds($request->duration);

            
        $copies=DB::table('copies')->where ('book_id','=', $request->book_id)
                                   ->where('conservation','=','Bom')
                                   ->get();

        foreach ($copies as $copy){
            $num_bookings=DB::table('Bookings')->where('copy_id', '=',$copy->id)
                                               ->where('status','=','reservado')->count();                       
            if($num_bookings>0){ 
                $bookings=DB::table('Bookings')->where('copy_id', '=',$copy->id)
                                              ->where('status','=','reservado')->get();
                $i=0;
                foreach ($bookings as $booking){
                  $i++;
                  if(($start_date < $booking->start_date & $end_date <= $booking->start_date) or ($start_date >= $booking->end_date)){
                    $tem_conflito = 0;
                  }
                  else{
                    $tem_conflito = 1;
                    break;
                  }
                }         
            }
            else{
              $tem_conflito = 0;
              break;
            }
            if($tem_conflito == 0){
              break;
            }
        }

        if ($tem_conflito == 0){
        $copy_id= $copy->id; 
        $randomString = str_random(8); 
        $subscribe        = new Booking;
        $subscribe->cod_booking = $randomString;
        $subscribe->start_date = $start_date;
        $subscribe->end_date = $end_date;
        $subscribe->user_id = $user_id;
        $subscribe->copy_id =  $copy_id;
        $subscribe->status = 'reservado';
        $subscribe->save();
         return redirect()->route('homepage')->with('message','Reserva efectuada com sucesso! O seu código de reserva é: '.$randomString);
        }
         else{
          return redirect()->back()->with('message','Este livro já tem uma reserva no período seleccionado! Escolha um outro período por favor.');
         }
    }
}