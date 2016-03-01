<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends CI_Model 
{
 
  public $cron_schedule;
 
  public function __construct() 
  {
      parent::__construct();
  }
 
  public function next_runtime($cron_value)
  {
 
    $j=0; // used as an internal counter to prevent an endless loop
    $time = time(); // time right now
    // split our cron into variables
    //list( $cron_minute, $cron_hour, $cron_day, $cron_month, $cron_day_of_week ) = split(" ", $this->cron_schedule );
 
    $cron_array = explode(" ", $cron_value);

    // Declare variables
    $cron_minute = $cron_array[0];
    $cron_hour = $cron_array[1];
    $cron_day = $cron_array[2];
    $cron_month = $cron_array[3];
    $cron_day_of_week = $cron_array[4];

    if( $cron_day_of_week == "0" ) $cron_day_of_week = "7"; // 7 and 0 both mean Sunday
 
    do
    {
      // split our current time into variables (the $time variable will be updated after every iteration)
      // list( $now_minute, $now_hour, $now_day, $now_month, $now_day_of_week ) = split( " ", date("i H d n N", $time ) );
 
      $now_array = explode(" ", date("i H d n N", $time ));

      $now_minute = $now_array[0];
      $now_hour = $now_array[1];
      $now_day = $now_array[2];
      $now_month = $now_array[3];
      $now_day_of_week = $now_array[4];

      if( $cron_month != "*" )
      {
        if( (int)$cron_month != $now_month )
        {
          $j++; // internal counter
          $now_month = (int)$now_month + 1; // increment the month by 1
          // set minute, hour and day to 0 so we start at the begining of the next month
          $time = mktime( 0, 0, 0, $now_month, 1, date("Y",$time) ); // $time + 1 month
          continue; // start again
        }
      }
 
      if( $cron_day != "*" )
      {
        if( (int)$cron_day != $now_day )
        {
          $j++; // internal counter
          $now_day = (int)$now_day + 1; // increment the day by 1
          // set minute and hour to 0 so we start at the begining of the next day
          $time = mktime( 0, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 day
          continue; // start again
        }
      }
 
      if( $cron_hour != "*" )
      {
        if( (int)$cron_hour != $now_hour )
        {
          $j++; // internal counter
          $now_hour = (int)$now_hour + 1; // increment the hour by 1
          // set minute to 0 so we start at the begining of the next hour
          $time = mktime( $now_hour, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 hour
          continue; // start again
        }
      }
 
      if( $cron_minute != "*" )
      {
        if( (int)$cron_minute != $now_minute )
        {
          $j++; // internal counter
          $now_minute = (int)$now_minute + 1; // increment the minute by 1
          $time = mktime( $now_hour, $now_minute, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 minute
          continue; // start again
        }
      }
 
      // must be checked last
      if( $cron_day_of_week != "*" )
      {
        if( (int)$cron_day_of_week != $now_day_of_week )
        {
          $j++; // internal counter
          $now_day = (int)$now_day + 1; // increment the day by 1
           // set minute and hour to 0 so we start at the begining of the next day
          $time = mktime( 0, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 day
          continue; // start again
        }
      }
 
      break; /* if we reach this point, all the conditions
      * above are true and we have our next cron time!
      */
 
    } while( $j < 10000 );
 
    return $time;
 
  }
 
  public function last_runtime($cron_value)
  {
 
    $j=0; // used as an internal counter to prevent an endless loop
    $time = time(); // time right now
    // split our cron into variables
    $cron_array = explode(" ", $cron_value);

    // Declare variables
    $cron_minute = $cron_array[0];
    $cron_hour = $cron_array[1];
    $cron_day = $cron_array[2];
    $cron_month = $cron_array[3];
    $cron_day_of_week = $cron_array[4];
 
    if( $cron_day_of_week == "0" ) $cron_day_of_week = "7"; // 7 and 0 both mean Sunday
 
    do
    {
      // split our current time into variables (the $time variable will be updated after every iteration)
      $now_array = explode(" ", date("i H d n N", $time ));

      $now_minute = $now_array[0];
      $now_hour = $now_array[1];
      $now_day = $now_array[2];
      $now_month = $now_array[3];
      $now_day_of_week = $now_array[4];

      if( $cron_month != "*" )
      {
        if( (int)$cron_month != $now_month )
        {
          $j++; // internal counter
          $now_month = (int)$now_month - 1; // subtract the month by 1
          $num_days_in_month = (int)date("t",mktime( 0, 0, 0, $now_month, 1, date("Y",$time) ) ); // number of days in month
          // set minute, hour and day to their highest value so we start at the end of the previous month
          $time = mktime( 23, 59, 59, $now_month, $num_days_in_month, date("Y",$time) ); // $time - 1 month
          continue; // start again
        }
      }
 
      if( $cron_day != "*" )
      {
        if( (int)$cron_day != $now_day )
        {
          $j++; // internal counter
          $now_day = (int)$now_day - 1; // subtract the day by 1
          // set minute and hour to their highest value so we start at the end of the previous day
          $time = mktime( 23, 59, 59, $now_month, $now_day, date("Y",$time) ); // $time - 1 day
          continue; // start again
        }
      }
 
      if( $cron_hour != "*" )
      {
        if( (int)$cron_hour != $now_hour )
        {
          $j++; // internal counter
          $now_hour = (int)$now_hour - 1; // subtract the hour by 1
          // set minute and second to their highest value so we start at the end of the previous hour
          $time = mktime( $now_hour, 59, 59, $now_month, $now_day, date("Y",$time) ); // $time + 1 hour
          continue; // start again
        }
      }
 
      if( $cron_minute != "*" )
      {
        if( (int)$cron_minute != $now_minute )
        {
          $j++; // internal counter
          $now_minute = (int)$now_minute - 1; // subtract the minute by 1
          $time = mktime( $now_hour, $now_minute, 59, $now_month, $now_day, date("Y",$time) ); // $time - 1 minute
          continue; // start again
        }
      }
 
      // must be checked last
      if( $cron_day_of_week != "*" )
      {
        if( (int)$cron_day_of_week != $now_day_of_week )
        {
          $j++; // internal counter
          $now_day = (int)$now_day - 1; // subtract the day by 1
           // set minute and hour to 0 so we start at the end of the previous day
          $time = mktime( 0, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time - 1 day
          continue; // start again
        }
      }
 
      break; /* if we reach this point, all the conditions
      * above are true and we have our previous cron time!
      */
 
    } while( $j < 10000 );
 
    return $time;
 
  }
 
}
 
/*
$cron_parser = new cron_parser("0 8 * * *");
$next_time = $cron_parser->next_runtime();
$last_time = $cron_parser->last_runtime();
var_dump( date( "m/d/Y H:i T", $next_time ) );
var_dump( date( "m/d/Y H:i T", $last_time ) );
*/