<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use DateTime;

use Illuminate\Http\Request;

class ChartJSController extends Controller
{
    //
    public function getAllMonths()
    {
        $month_array = array();
        $doctor_messages_date = Auth::user()->messages->sortBy('created_at',false)->pluck('created_at');//con false riordino in modo crescente - dal più vecchio messaggio all'ultimo arrivato
        $doctor_messages_date = json_decode($doctor_messages_date);

        /* dd($doctor_messages_date); */
        
        if ( ! empty( $doctor_messages_date ) ) {
			foreach ( $doctor_messages_date as $unformatted_date ) {
                $date = new \DateTime($unformatted_date);
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
        return $month_array;
    }

    function getMonthlyMessageCount( $month ) {
        $doctor_messages_date = json_decode(Auth::user()->messages->sortBy('created_at',false)->pluck('created_at'));
        $month_array = array();
        if ( ! empty( $doctor_messages_date ) ) {
            //dd($doctor_messages_date);
			foreach ( $doctor_messages_date as $i => $unformatted_date ) {
                $date = new \DateTime($unformatted_date);
				$month_no = $date->format( 'm' );
                array_push($month_array,$month_no);
			}
		}
        $monthly_array_message_count = array_count_values($month_array);
        //dd($monthly_array_message_count[$month]);

		return $monthly_array_message_count[$month];
	}

    function getMonthlyMessageData() {

		$monthly_message_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
            foreach ( $month_array as $month_no => $month_name ){
				$monthly_message_count = $this->getMonthlyMessageCount( $month_no );
				array_push( $monthly_message_count_array, $monthly_message_count );
				array_push( $month_name_array, $month_name );
			}
		}

		/* $max_no = max( $monthly_message_count_array );
        dd($max_no);
		$max = round(( $max_no + 10/2 ) / 10 ) * 10; */
		$monthly_message_data_array = array(
                'months' => $month_name_array,
                'message_count_data' => $monthly_message_count_array,
                //'max' => $max,
            
		);

		return $monthly_message_data_array;

    }
}
