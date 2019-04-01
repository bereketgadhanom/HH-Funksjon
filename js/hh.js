

$(document).ready(function() {

            //Gjøre kravspesifikasjonvalget synlig hvis brukeren velger ja på valgfag

            //Vi velger selectoren #valgfag-ja, som er id'en på radioknappen for å velge ja på spørsmålet om valgfag.
            //Deretter knytter vi på funksjonen .on, som kan sjekke om selectoren er klikket ('click') eller endret ('change').
            //Hvis elementet selectoren viser til er endret, kjører vi en funksjon:
            $("#roomtype").on('change', function() {
                  if($(this).val()==1){
                    $("#room_number_e").slideDown();
                  }
                  if($(this).val()==2){
                    $("#room_number_d").slideDown();
                  }
                  if($(this).val()==3){
                    $("#room_number_s").slideDown();
                  }
                  if($(this).val()==4){
                    $("#room_number_b").slideDown();
                  }
                  // else{
                    // $("#room_number_e")->slideUp();
                    // $("#room_number_d")->slideUp();
                    // $("#room_number_s")->slideUp();
                    // $("#room_number_b")->slideUp();
                  // }
            });
        });
        //         //Funksjonen finner først selectoren #kravspek-container, og gjør denne synlig via en enkel animasjon som er forhåndslagt inn i funksjonen slideDown().
        //         //Dette gjør vi siden brukeren har sagt "ja, jeg tar faget som valgfag", og skal dermed få muligheten
        //         //til å velge kravspesifikasjon.
        //         $("#kravspek-container").slideDown();
        //
        //         //Dersom brukeren har klikket nei på spørsmålet om valgfag, er prosjektbeskrivelsen synlig.
        //         //Vi må derfor sikre at denne er skjult dersom brukeren velger ja.
        //         //Vi bruker #besk-container som selector, og skjuler denne med funksjonen .slideUp().
        //         $("#besk-container").slideUp();
        //     });
        //
        //     //Hvis brukeren ikke tar dette som valgfag, må vi gjøre akkurat det motsatte av koden over.
        //     $("#valgfag-nei").on('change', function() {
        //         //console.log("Ja er endret");
        //         $("#kravspek-container").slideUp();
        //         $("#besk-container").slideDown();
        //     });
        //
        //     //Akkurat samme prinsipper ligger til grunnen for valg av gruppe. Hvis gruppe er ja, skal vi vise felt for å
        //     //oppgi gruppemedlemmer. Hvis gruppe er nei, sørger vi for å skjule gruppemedlemmer-feltet.
        //     $("#gruppe-ja").on('change', function() {
        //         $("#gruppemedlemmer-container").slideDown();
        //     });
        //     $("#gruppe-nei").on('change', function() {
        //         $("#gruppemedlemmer-container").slideUp();
        //     });
        //
        //
        //     //Hvis kravspesifikasjonsvelgeren blir satt til "eget prosjekt", skal brukeren også fylle ut prosjektbeskrivelsen.
        //     //For å sjekke verdien som er valgt, bruker vi funksjonen .val(). Denne funksjonen må knyttes til en selector. Siden
        //     //vi allerede har angitt og er inne i en selector (#kravspek), kan vi vise til denne selectoren ved å bruke jQuery-selectoren
        //     //$(this). Når vi så knytter på funksjonen .val(), vil koden $(this).val() inneholde det som står i value-attributten på den
        //     //brukervalgte option i select-boksen med id #kravspek.
        //     //Da kan vi sjekke om den er 4 (som er verdien for eget prosjekt. Bruk inspektoren i nettleseren på denne select-boksen, så ser)
        //     //dere alle options og hvilke values(verdier) de har.
        //     //Hvis verdien er 4, skal vi gjøre prosjektbeskrivelsefeltet synlig. Hvis verdien ikke er 4, skal vi sørge for at
        //     //prosjektbeskrivelsesfeltet er skjult.
        //     $('#kravspek').on('change', function() {
        //         if( $(this).val() == 4 ) {
        //             $("#besk-container").slideDown();
        //         } else {
        //             $("#besk-container").slideUp();
        //         }
        //     });
        //
        //
        //     //Vi ønsker å sørge for at brukeren må velge en dag for ønsket veiledning, for deretter å bli tilbudt de tidene som er
        //     //tilgjengelig denne dagen. IDen til selectboksen med dager som kan velges er #dag, ergo sjekker vi om denne blir endret.
        //     //(PS: her har vi sørget for at selectboksen med tider (id #tid) og alle options inne i denne er skjult i CSS-en.)
        //     $("#dag").on('change', function() {
        //
        //         //Hvis #dag blir endret, skal vi vise selectboksen med tider (#tid) og den første option i denne selectboksen (#select-day).
        //         $("#tid").slideDown();
        //         $("#select-day").show();
        //
        //         //Avhengig av verdien som blir valgt, skal vi vise ulike tider. Vi må derfor sjekke hvilken option som er valgt i den selectoren vi er i (#dag). Dette gjør vi ved å vise
        //         //til den forhåndsdefinerte selectoren $(this). For å finne verdien som er valgt, bruker vi funksjonen .val().
        //         //Dette plasserer vi i en if-test, og sjekker først om $(this).val() (som betyr den verdien av den
        //         //valgte <option>-tagen i selected med id #dag) er "tir" (value-attributten på <option>-tagen for tirsdag.)
        //         if( $(this).val() == "tir" ) {
        //             //Hvis tirsdag er valgt, velger vi å vise alle options som har klassen "tirsdag" ved å bruke funksjonen .show().
        //             //I tillegg sikrer vi oss at alle options med klasse "torsdag" blir skjult gjennom funksjonen .hide().
        //             $(".tirsdag").prop('disabled', false).show();
        //             $(".torsdag").prop('disabled', true).hide();
        //         }
        //         //Hvis brukeren velger torsdag, må vi gjøre nøyaktig motsatt av hva vi gjorde på tirsdag i koden over.
        //         if( $(this).val() == "tor" ) {
        //             $(".tirsdag").prop('disabled', true).hide();
        //             $(".torsdag").prop('disabled', false).show();
        //         }
        //     });
        // });
