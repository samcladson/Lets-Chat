$(document).ready(function() {
    const FormDataArray = {};

    $slickOptions = {
        arrows:false,
        infinite:false,
        fade:true,
        draggable:false,
        mobileFirst:true,
        swipe:false,
        touchMove:false,
        adaptiveHeight:true,
        initialSlide:0
    }
    $slides = $('.fullpage').slick($slickOptions);

    $('#myTab .nav-item .nav-link').click(function(){
        console.log($('.slick-active').index());
        if($('.slick-active').index() !== 0){
            $slides.slick('unslick');
            $('.fullpage').slick($slickOptions)
        }
    })
    $('.estimateBtn11').click(function() {
        $.when(CollectDataForm11()).then(function(){
            setTimeout(() => {
                changeSlide();
            }, 1000);
        });
    });
    $('.estimateBtn12').click(function() {
        $.when(CollectDataForm12()).then(function(){
            setTimeout(() => {
                changeSlide();
            }, 1000);
        });
    });
    $('.estimateBtn2').click(function() {
        $.when(CollectDataForm2()).then(function(){
            setTimeout(() => {
                changeSlide();
            }, 1000);
        });
    });
    $('.roomTypeSelection').click(function(){
        $.when(CollectDataForm2()).then(function(){
            setTimeout(()=>{
                changeSlide();
            },1000);
        })
    })
    $('.dateSelection').click(function(){
        $.when(CollectFormData3()).then(function(){
            setTimeout(()=>{
                changeSlide()
            },1000);
        })
    })
    $('.collectContactButton').click(function(){
        $.when(CollectFormData4()).then(function(){
            setTimeout(()=>{
                sendEmail();
            },1000);
        })
    })
    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').toggleClass('active')
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })

    $datepicker = $('[data-toggle="datepicker"]').datepicker({
        startDate:new Date(),
        inline:true,
        autoPick:true,
        format:'dd/mm/yyyy'
    });
    $('.calendar').val($datepicker.datepicker('getDate',true));
    $datepicker.on('pick.datepicker',function(e){
        $date = convertDate(e.date);
        $('.calendar').val($date);
    })
    $('.types input[type=radio]').on('change', function() {
        if(this.value == "Vehicle"){
            $('.property-size-div').addClass('disabled');
        }else{
            if($('.property-size-div').hasClass('disabled')){
                $('.property-size-div').removeClass('disabled');
            }
        }
    });

    function changeSlide(){
        $slides.slick('slickNext');
    }

    function CollectDataForm11(){
        $data = $('form.form11').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        FormDataArray.data_one=$data;
    }
    function CollectDataForm12(){
        $data = $('form.form12').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        FormDataArray.data_one=$data;
    }
    function CollectDataForm2(){
        $data = $('form#form2').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        FormDataArray.data_two=$data;
        console.log(FormDataArray);
    }
    function CollectFormData3(){
        $data = { "movingDate" :  $('.calendar').val()};
        FormDataArray.data_three=$data;
        console.log(FormDataArray);
    }
    function CollectFormData4(){
        $data = $('form.form3').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        FormDataArray.data_four=$data;
        console.log(FormDataArray);
    }
    function convertDate(date) {
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth() + 1).toString();
        var dd = date.getDate().toString();

        var mmChars = mm.split('');
        var ddChars = dd.split('');

        return (ddChars[1] ? dd : "0" + ddChars[0]) + '/' + (mmChars[1] ? mm : "0" + mmChars[0]) + '/' + yyyy;
    }

    function sendEmail(){
        console.log(FormDataArray);
        $.ajax({
            url: "mail.php",
            type: "POST",
            data: { data : JSON.stringify(FormDataArray) },
            ContentType: 'application/json',
            success: function (data) {
                changeSlide();
            },
            error: function (err) {
                console.log(`Error : ${err}`);
            }
        });
    }
});