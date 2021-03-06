$(document).ready(function(){
   // tablica errorLogArray służy do przechowywania wszelkich błędów
   // logowania. Jeżeli nie będzie pusta podczas uruchomienia submitta
   // submitt nie wykona akcji.
   
    var errorLogingArray = {};
    var minUserNameLength = 5;
    var minPasswordLength = 5;
    
    //////// obsługa logowania /////////
    $('#twitaj').on('click', function() {
        $('div #formComment').empty();
        if( $.trim( $('#email').val() ).length < minUserNameLength ) {
            event.preventDefault();
            var errorMessage = $('<span>*' + 'Niepoprawny adres email' + '</span><br>');
            $('div #formComment').prepend(errorMessage); 
        } else if ( $('#passwd').val().length <= minPasswordLength ) {
            event.preventDefault();
            var errorMessage = $('<span>*' + 'Zbyt krótkie hasło' + '</span><br>');
            $('div #formComment').prepend(errorMessage); 
        }
    })
    
    
    /////// obsługa załozenia konta /////////
   
   // event na buttonie 'Załóż Twitka' 1
    $('#goToCountForm').on('click', function(){
            event.preventDefault();
            $('div #formComment').empty();
            $('.hiddenLoging').slideDown(200);
            $('#goToCountForm').css('display','none');
            $('#twitaj').css('display','none');
    }) // koniec 'Załóż Twitka' 1
    
    // sprawdzanie poprawności haseł
    $('#passwdRepeat, #passwd').on('keyup', function(){
        if($('#passwd').val() === $('#passwdRepeat').val()
        && $('#passwd').val().length >= minPasswordLength){
           $('#passwd').addClass('poleOk');
           $('#passwdRepeat').addClass('poleOk');
           delete errorLogingArray['passwd'];  
        } else {
            $('#passwdRepeat').removeClass('poleOk');
            $('#passwd').removeClass('poleOk');
            errorLogingArray['passwd'] = "hasła nie są identyczne";    
            // komunikaty z tablicy błędów zostaną wyświetlone tylko
            // przy użyciu przycisku '#createCount', a więc tylko przy zakładaniu nowego konta.
            // Podczas logowania tablica 'errorLogingArray' na wszelki wypadek zostaje czyszczona.
        }
    }) // koniec sprawdzania poprawności haseł
    
    // obsługa pola #username
    $('#username').on('keyup', function() {
        if( $.isNumeric( $('#username').val() )
            || $.trim( $('#username').val() ).length < minUserNameLength
        ) {
           errorLogingArray['username'] = "Niepoprawny login";
           $('#username').removeClass('poleOk');
        } else {
            $('#username').addClass('poleOk');
            delete errorLogingArray['username'];
        }  
    }) // koniec obsługi pola #username
    
    $('#email').on('keyup', function() {
        if( $.isNumeric( $('#email').val()[0] ) // pierwsza wartość nie może być cyfrą
           || $('#email').val().indexOf('@') == -1 // musi występować małpa
           || $('#email').val().indexOf('.') == -1 // musi występować kropka
        ){
           errorLogingArray['email'] = "Niepoprawny email";
           $('#email').removeClass('poleOk');
        } else {
           $('#email').addClass('poleOk');
           delete errorLogingArray['email'];
        }  
    }) // koniec obsługi pola #username
    
    // event na buttonie 'Załóż Twitka' 2
    $('#createCount').on('click', function() {
        $('div #formComment').empty();
        var preventSubmitIfError = 0; // jeśli > 0, nie zostanie wywołany submit
        
        if ( $('#username')[0].value.length === 0 ){
            var emptyName = $('<span id="emptyName">*Wprowadź nazwę użytkownika</span><br>');
            $('div #formComment').prepend(emptyName);
            preventSubmitIfError++;
        }
        
        if ( $('#email')[0].value.length === 0 ){
            var emptyEmail = $('<span id="emptyEmail">*Wprowadź adres email</span><br>');
            $('div #formComment').prepend(emptyEmail);
            preventSubmitIfError++;
        }
        
        if ( $('#passwd')[0].value.length === 0 ){
            var emptyPassword = $('<span id="emptyPassword">*Wprowadź hasło</span><br>');
            $('div #formComment').prepend(emptyPassword);
            preventSubmitIfError++;
        }
        
        if( preventSubmitIfError == 0 ){
            var errorNumber = 0; // wielkość określająca w ilu polach formularza do zalogowania wprowadzono niewłasciwe dane
            $.each(errorLogingArray, function(index, value){
                errorNumber++;
                // console.log(errorNumber);
            });
            if ( errorNumber > 0 ) {
                event.preventDefault();
                $.each(errorLogingArray, function(index, value){
                    var errorMessage = $('<span id="emptyName">*' + errorLogingArray[index] + '</span><br>');
                    $('div #formComment').prepend(errorMessage);                   
                });
            } 
        } else { // jeśli któreś z pól jest puste
            event.preventDefault();
        }
       
    }) // koniec obsługi buttona 'Załóż Twitka' 2
    
    
    
   
}) // koniec DOM



/* metoda na zliczenie błędów występujących podczas logowania
        var i = 0;
        console.log($.each(errorLogingArray, function(){
                i++;
                return i;
            })
        );
        */