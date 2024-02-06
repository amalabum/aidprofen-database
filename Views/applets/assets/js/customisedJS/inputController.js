function handleSubmitButtonState(config) {
    var buttonId = config.buttonId;
    var inputElements = config.inputElements;
    var validationRules = config.validationRules;


    var Button_submit = document.getElementById(buttonId);
    Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
    Button_submit.disabled = true;

    inputElements.forEach(function(element) {
        $(element.id).on('input', checkFieldsState);
        $(element.feedbackLabel).hide(); // Cacher les messages d'erreur par défaut
    });
    function checkFieldsState() {
    // alert("La fonction checkFieldsState est appelée");
    // alert("Début de la vérification des champs");
    var fieldValues = getInputFieldValues();
    // alert("Valeurs des champs récupérées");
    updateButtonState(fieldValues);
    // alert("État du bouton mis à jour");
    updateFeedbackLabels(fieldValues);
    //alert("Étiquettes de rétroaction mises à jour");
    }
    function getInputFieldValues() {
        var fieldValues = {};
        inputElements.forEach(function(element) {
            fieldValues[element.id] = $(element.id).val();
        });
        return fieldValues;
    }
    function updateButtonState(fieldValues) {
        var allConditionsMet = inputElements.every(function(element) {
            var value = fieldValues[element.id];
            var validationRule = validationRules[element.id];
            return validationRule(value);
        });
        if (allConditionsMet) {             
                Button_submit.setAttribute("class", "btn btn-primary");
                Button_submit.disabled = false;
        } else {
            Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
            Button_submit.disabled = true;
        }
    }
    function updateFeedbackLabels(fieldValues) {
        inputElements.forEach(function(element) {
            var value = fieldValues[element.id];
            var validationRule = validationRules[element.id];
            var feedbackLabel = $(element.feedbackLabel);

            if (value && validationRule(value)) {
                feedbackLabel.hide(); // Cacher le message d'erreur si la condition est remplie
            } else {
                var errorMessage = element.errorMessage || 'Invalid input';
                feedbackLabel.text(errorMessage).show(); // Afficher le message d'erreur si la condition n'est pas remplie
            }
        });
    }
}

// cas d'un password



function handleSubmitButtonState_for_password(config) {
    var buttonId = config.buttonId;
    var inputElements = config.inputElements;
    var validationRules = config.validationRules;

    var pass1 = $('#pass1');
    var pass2 = $('#pass2');
    pass1.on('input', checkFieldsState);
    pass2.on('input', checkFieldsState);
    var pass1val = pass1.val();
    var pass2val = pass2.val();
    var passrror = $('#passwd');
    passrror.css('display', 'none'); 


    var Button_submit = document.getElementById(buttonId);
    Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
    Button_submit.disabled = true;

    inputElements.forEach(function(element) {
        $(element.id).on('input', checkFieldsState);
        $(element.feedbackLabel).hide(); // Cacher les messages d'erreur par défaut
    });
    function checkFieldsState() {
    // alert("La fonction checkFieldsState est appelée");
    // alert("Début de la vérification des champs");
    var fieldValues = getInputFieldValues();
    // alert("Valeurs des champs récupérées");
    updateButtonState(fieldValues);
    // alert("État du bouton mis à jour");
    updateFeedbackLabels(fieldValues);
    //alert("Étiquettes de rétroaction mises à jour");
    }
    function getInputFieldValues() {
        var fieldValues = {};
        inputElements.forEach(function(element) {
            fieldValues[element.id] = $(element.id).val();
        });
        return fieldValues;
    }
    function updateButtonState(fieldValues) {
        var allConditionsMet = inputElements.every(function(element) {
            var value = fieldValues[element.id];
            var validationRule = validationRules[element.id];
            return validationRule(value);
        });
        if (allConditionsMet) {

            if (pass1.val() == pass2.val()) {  
                var passrror = $('#passwd');
                passrror.css('display', 'none');
                Button_submit.setAttribute("class", "btn btn-primary");
                Button_submit.disabled = false;           
            }
            else{
                var passrror = $('#passwd');
                passrror.css('display', 'block');
                Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
                Button_submit.disabled = true; 
            } 

        } else {
            Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
            Button_submit.disabled = true;
        }
    }
    function updateFeedbackLabels(fieldValues) {
        inputElements.forEach(function(element) {
            var value = fieldValues[element.id];
            var validationRule = validationRules[element.id];
            var feedbackLabel = $(element.feedbackLabel);

            if (value && validationRule(value)) {
                feedbackLabel.hide(); // Cacher le message d'erreur si la condition est remplie
            } else {
                var errorMessage = element.errorMessage || 'Invalid input';
                feedbackLabel.text(errorMessage).show(); // Afficher le message d'erreur si la condition n'est pas remplie
            }
        });
    }
}
