$(function() {
  'use strict';

  if($('#datePickerExample').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample').datepicker('setDate', today);
  }
  if($('#datePickerExample2').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate()+3);
    $('#datePickerExample2').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample2').datepicker('setDate', today);
  }
  if($('#datePickerExample3').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample3').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample3').datepicker('setDate', today);
  }
});