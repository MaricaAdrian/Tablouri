var $textBox;
var getSelection;
var saveSelection;
var unbind;
var selection;
$(document).ready(function() {
	$textBox = $("#insert");
    $sub = $("#inserts");
	
	function saveSelection(){
        $textBox.data("lastSelection", $textBox.getSelection());
    }
    
    $textBox.focusout(saveSelection);
    
    $textBox.bind("beforedeactivate", function() {
        saveSelection();
        $textBox.unbind("focusout");
    });
	function save(){
        $sub.data("lastSelection", $sub.getSelection());
    }
    
    $sub.focusout(save);
    
    $sub.bind("beforedeactivate", function() {
        save();
        $sub.unbind("focusout");
    });
});
	


function insertText(text) {
    selection = $textBox.data("lastSelection");
    $textBox.focus();
    $textBox.setSelection(selection.start, selection.end);
    $textBox.replaceSelectedText(text);
	selections = $sub.data("lastSelection");
    $sub.focus();
    $sub.setSelection(selections.start, selections.end);
    $sub.replaceSelectedText(text);
}