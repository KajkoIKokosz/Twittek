$(document).ready(function(){
   // tablica errorLogArray służy do przechowywania wszelkich błędów
   // logowania. Jeżeli nie będzie pusta podczas uruchomienia submitta
   // submitt nie wykona akcji.
   var errorLogingArray = [];
   
   // event na buttonie 'Załóż Twitka'
    $('#createCount').on('click', function(){
            event.preventDefault();
            $('.hiddenLoging').slideDown(200);
           //$('#lub').css('display','none');
            $('#createCount').css('display','none');
            $('#twitaj').css('display','none');
    }) // koniec 'Załóż Twitka'
    
    // sprawdzanie poprawności haseł
    $('#passwdRepeat, #passwd').on('keyup', function(){
        if($('#passwd').val() === $('#passwdRepeat').val()
        && $('#passwd').val().length > 5){
           $('#passwd').addClass('hasloOk');
           $('#passwdRepeat').addClass('hasloOk');
           delete errorLogingArray['passwd'];
        } else {
            $('#passwdRepeat').removeClass('hasloOk');
            $('#passwd').removeClass('hasloOk');
            errorLogingArray['passwd'] = "hasła nie są identyczne";    
        }
    }) // koniec sprawdzania poprawności haseł
    
    
    
    
    
}) // koniec DOM



/* metoda na zliczenie błędów występujących podczas logowania
        var i = 0;
        console.log($.each(errorLogingArray, function(){
                i++;
                return i;
            })
        );
        */