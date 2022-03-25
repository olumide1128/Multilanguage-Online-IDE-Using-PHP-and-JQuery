

let editor;

window.onload = function(){
	ace.require("ace/ext/language_tools");

	editor = ace.edit("editor");
	editor.setTheme("ace/theme/monokai");
	editor.session.setMode("ace/mode/c_cpp");

	editor.setOptions({
		enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true
	});

}


function changeLanguage(){

	let language = $('#languages').val();

	if(languages == 'c' || language == 'cpp'){
		editor.session.setMode("ace/mode/c_cpp");
	}

	else if(language == 'php'){
		editor.session.setMode("ace/mode/php");
	}

	else if(language == 'py'){
		editor.session.setMode("ace/mode/python");
	}

	else if(langauge == 'js'){
		editor.session.setMode("ace/mode/javascript");
	}
}


function executeCode(){
	$.ajax({
		url: "/codingIDE/app/compiler.php",
		method: "POST",
		data: {
			language: $("#languages").val(),
			code: editor.getSession().getValue()
		},

		success: function(response){
			console.log(response);
			console.log(response.split("\n"));

			response = response.replaceAll("\n", "<br>&nbsp;&nbsp;&nbsp;&nbsp;");

			$(".output").html(">> "+response);
		}

	});
}
