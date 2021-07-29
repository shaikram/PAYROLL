$(document).ready(function(){
  $('#validateP').submit(function(){
    var count = $('#count').val();
                                                                                                                                                                                                                                                          //
    for (var i = 1; i <= count; i++) {
      var dateFrom = document.getElementById('dateFrom');
      var dateTo = document.getElementById('dateTo');
      var dtr = document.getElementById('dtr');
      var duty = document.getElementById('duty'+i);
      var rate = document.getElementById('rate'+i);
      var ot = document.getElementById('ot'+i);
      var op = document.getElementById('op'+i);
      var noh = document.getElementById('noh'+i);
      var holType = document.getElementById('holType'+i);
      var gp = document.getElementById('gp'+i);
      var sss = document.getElementById('sss'+i);
      var philhealth = document.getElementById('philhealth'+i);
      var hmdf = document.getElementById('hmdf'+i);
      var cb = document.getElementById('cb'+i);
      var ca = document.getElementById('ca'+i);
      var td = document.getElementById('td'+i);
      var np = document.getElementById('np'+i);

      var dFromVal = document.getElementById('dateFrom').value;
      var dToVal = document.getElementById('dateTo').value;
      var dtrVal = document.getElementById('dtr').value;
      var dutyVal = document.getElementById('duty'+i).value;
      var rateVal = document.getElementById('rate'+i).value;
      var otVal = document.getElementById('ot'+i).value;
      var opVal = document.getElementById('op'+i).value;
      var nohVal = document.getElementById('noh'+i).value;
      var holTypeVal = document.getElementById('holType'+i).value;
      var gpVal = document.getElementById('gp'+i).value;
      var sssVal = document.getElementById('sss'+i).value;
      var philhealthVal = document.getElementById('philhealth'+i).value;
      var hmdfVal = document.getElementById('hmdf'+i).value;
      var cbVal = document.getElementById('cb'+i).value;
      var caVal = document.getElementById('ca'+i).value;
      var tdVal = document.getElementById('td'+i).value;
      var npVal = document.getElementById('np'+i).value;


      switch(true){
        case dFromVal.length == 0:
          alert('Date is required!');
          dateFrom.focus();
          return false;
        break;

        case dToVal.length == 0:
          alert('Date is required!');
          dateTo.focus();
          return false;
        break;

        case dtrVal.length == 0:
          alert('DTR is required!');
          dtr.focus();
          return false;
        break;

        case dutyVal.length == 0:
          alert('Duty is required!');
          duty.focus();
          return false;
        break;

        case dutyVal < 0:
          alert('Duty must be positive numbers!');
          duty.focus();
          return false;
        break;

        case rateVal.length == 0:
           alert('Rate is required!');
           rate.focus();
           return false;
         break;

        case rateVal < 0:
           alert('Rate must be positive numbers!');
           rate.focus();
           return false;
         break;

        case otVal.length == 0:
            alert('No. of OT is required!');
            ot.focus();
            return false;
          break;

        case otVal < 0:
            alert('No. of OT must be positive numbers!');
            ot.focus();
            return false;
          break;

        case opVal.length == 0:
            alert('Overtime Pay is required!');
            op.focus();
            return false;
          break;

        case opVal < 0:
            alert('Overtime Pay must be positive numbers!');
            op.focus();
            return false;
          break;

        case nohVal.length == 0:
            alert('No. of Holidays is required!');
            noh.focus();
            return false;
          break;

        case nohVal < 0:
            alert('No. of Holidays must be positive numbers!');
            noh.focus();
            return false;
          break;

        case holTypeVal.length == 0:
            alert('Type of Holidays is required!');
            holType.focus();
            return false;
          break;

        case cbVal.length == 0:
            alert('Cash Bond is required!');
            cb.focus();
            return false;
          break;

        case cbVal < 0:
            alert('Cash Bond must be positive numbers!');
            cb.focus();
            return false;
          break;

        case caVal.length == 0:
            alert('Cash Advance is required!');
            ca.focus();
            return false;
          break;

        case caVal < 0:
            alert('Cash Advance must be positive numbers!');
            ca.focus();
            return false;
          break;


      }

      // alert(i+".)"+sssVal+" | "+philhealthVal+" | "+hmdfVal+" | "+cbVal+" | "+caVal+" | "+tdVal+" | "+npVal);

    }

  });
});
