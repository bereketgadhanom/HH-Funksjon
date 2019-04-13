
     $(document).ready(function() {

            // Romene vises med hensyn til valg av romtype og regn ut pris
        $("#roomtype, #antall_rom, #antall_netter").on('change', function() {
            if($("#roomtype").val()==1){
                $("#room_number_e").slideDown();
                $("#room_number_d").slideUp();
                $("#room_number_s").slideUp();
                $("#room_number_b").slideUp();

                    // Pris for enkelt rom
                var a_r = $('#antall_rom').val();
                var a_n = $('#antall_netter').val();
                var total_pris = (a_r * a_n * 990)
                $("#total-price").val(total_pris);
            }
            else if($("#roomtype").val()==2){
                $("#room_number_d").slideDown();
                $("#room_number_e").slideUp();
                $("#room_number_s").slideUp();
                $("#room_number_b").slideUp();

                    // Pris for dobbelt rom
                var a_r = $('#antall_rom').val();
                var a_n = $('#antall_netter').val();
                var total_pris = (a_r * a_n * 1290)
                $("#total-price").val(total_pris);
            }
            else if($("#roomtype").val()==3){
                $("#room_number_s").slideDown();
                $("#room_number_e").slideUp();
                $("#room_number_d").slideUp();
                $("#room_number_b").slideUp();

                    // Pris for suite rom
                var a_r = $('#antall_rom').val();
                var a_n = $('#antall_netter').val();
                var total_pris = (a_r * a_n * 1990)
                $("#total-price").val(total_pris);
            }
            else if($("#roomtype").val()==4){
                $("#room_number_b").slideDown();
                $("#room_number_d").slideUp();
                $("#room_number_s").slideUp();
                $("#room_number_e").slideUp();

                    // Pris for enkelt rom
                var a_r = $('#antall_rom').val();
                var a_n = $('#antall_netter').val();
                var total_pris = (a_r * a_n * 2490)
                $("#total-price").val(total_pris);
            }
            else{
                $(".room_option").slideUp();
            }
        });

            // Sett option  onchange
        $('.room_option').change(function(){
            var value = $(this).val();
            // Sett det som er valgt
            $('.room_option').val(value);
        });

        // Parkering valg viser hvis kunden velger ja
        $(".parking").on('change', function(){
            if($(this).val()=="Ja"){
                $("#parking-place").slideDown();
            }
            if($(this).val()=="Nei") {
                $(this).val();
                $('#parking-place').val("--");
                $("#parking-place").slideUp();
            }
        });

        // Deaktivere tidligere dato-er og bruk datepicker
        $("#check-in, #check-out").datepicker({
            minDate: new Date(),
            dateFormat: 'yy-mm-dd'
        });
});
