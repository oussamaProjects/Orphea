var stateMoreFields = 'hide';

jQuery(document).ready(function($){
  $('#gform_4').on('submit', function(e) {
    e.preventDefault();
  });



  $('#gform_4 .more_fields').on('click', function(e) {
    e.preventDefault();
    $('#gform_4 .field_optional').toggle();
    // if(stateMoreFields == 'show') {
    //   $(this).text('+ de critères');
    //   stateMoreFields = 'hide';
    // } else {
    //   $(this).text('- de critères');
    //   stateMoreFields = 'show';
    // }
  });

  $('#gform_4 select#input_4_1').on('change', function() {
    if($('option:selected', this).val() == 1) {
      $('#gform_4 select#input_4_2 option[value=5]').prop('selected',true);
      $('#gform_4 select#input_4_3 option[value=10000]').prop('selected',true);
    } else if($('option:selected', this).val() == 2) {
      $('#gform_4 select#input_4_2 option[value=10]').prop('selected',true);
      $('#gform_4 select#input_4_3 option[value=20000]').prop('selected',true);
    } else if($('option:selected', this).val() == 3) {
      $('#gform_4 select#input_4_2 option[value=50]').prop('selected',true);
      $('#gform_4 select#input_4_3 option[value=50000]').prop('selected',true);
    }
  });

  $('#gform_4').on('change keyup', 'select,input', function() {
    //Constant
    var coutMoyenAnnuelDAM = [12667,28667,58333],
        nbSemaineTravailAn = 45;

    //Needed
    var tailEntr   = $('#gform_4 select#input_4_1 option:selected').val(), // 1-3
        nbCollabos = $('#gform_4 select#input_4_2 option:selected').val(),
        nbMedias   = $('#gform_4 select#input_4_3 option:selected').val();

    //Optional
    var nbTempsRecherche    = $('#gform_4 input#input_4_5').val(),
        coutMoyenHeure      = $('#gform_4 input#input_4_6').val(),
        nbActifsRecrees     = $('#gform_4 input#input_4_7').val() / 100, //Percentage
        coutMoyenConception = $('#gform_4 input#input_4_8').val();

    if(!nbTempsRecherche)
      nbTempsRecherche = 2;
    if(!coutMoyenHeure)
      coutMoyenHeure = 28;
    if(!nbActifsRecrees)
      nbActifsRecrees = 0.02;
    if(!coutMoyenConception)
      coutMoyenConception = 100;

    var coutMoyenAnnuelDAMSelected = coutMoyenAnnuelDAM[tailEntr-1];

    var coutRechercheDocumentaire    = nbTempsRecherche * coutMoyenHeure * nbCollabos * nbSemaineTravailAn,
        countDuplicationDocumentaire = nbMedias * nbActifsRecrees * coutMoyenConception;

    var totalEconomies = Math.round( coutRechercheDocumentaire + countDuplicationDocumentaire );
    if(!totalEconomies || roi <= 0)
      strTotalEconomies = '?';
    else
      strTotalEconomies = totalEconomies.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + ' €';

    var roi = Math.round( ((totalEconomies - coutMoyenAnnuelDAMSelected) / coutMoyenAnnuelDAMSelected) * 100 );
    if(!roi || roi <= 0)
      roi = '?';
    else
      roi = roi + ' %';

    $('.roi_result').text(roi);
    $('.economie_result').text(strTotalEconomies);
  });
});
