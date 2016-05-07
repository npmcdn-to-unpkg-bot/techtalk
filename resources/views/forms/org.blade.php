@include('errors.flash')
<div class="row">
	<h4 class="center">General Information</h4><br />

	<div class="input-field">
		{!! Form::text('name', null, ['class' => 'validate']) !!}
		{!! Form::label('name', 'Name:', ['class' => 'active']) !!}
	</div>

	<div class="input-field">
		{!! Form::text('website', null, ['class' => 'validate']) !!}
		{!! Form::label('website', 'Website:', ['class' => 'active']) !!}
	</div>
	
	<div class="input-field">
		{!! Form::textarea('short_desc', null, ['class' => 'materialize-textarea', 'length' => '160']) !!}
		{!! Form::label('short_desc', 'Short Description:', ['class' => 'active']) !!}
	</div>

	<div class="input-field">
		{!! Form::textarea('long_desc', null, ['class' => 'materialize-textarea']) !!}
		{!! Form::label('long_desc', 'Long Description:', ['class' => 'active']) !!}
	</div>

	<div class="valign-wrapper" id="cur_logo">
		<a class="btn valign" id="edit_logo">Change Logo<i class="material-icons left">clear</i></a>
		<img style="margin-top: 1rem;" src="{{ $org->logo }}" alt="{{ $org->name . " - Logo" }}" class="logo valign" />
	</div>

	<div class="file-field input-field" id="new_logo" style="display:none;">
		<div class="btn">
			<i class="material-icons left">attach_file</i>
			<span>Logo</span>
			<input type="file" name="logo">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		</div>
	</div><br />
</div>

<div class="row">
	<h4 class="center">Categorization</h4><br />

	<!--<div class="input-field">-->
	<!--	{!! Form::label('tag_list', 'Tags:') !!}-->
	<!--	{!! Form::select('tag_list[]', $categories['tags'], null, ['class' => 'tag_list', 'multiple']) !!}-->
	<!--</div>-->

<!-- 		<div class="input-field">
		<input name="tag_list[]" value="{{ $selections['tags'] }}" type="text" data-role="materialtags" />
		{!! Form::label('tag_list', 'Tags') !!}
		<p style="margin:0;">(seperate by pressing enter)</p>
	</div>  -->

<!-- 		<div class="input-field">
		{!! Form::label('tag_list', 'Tags') !!}
		{!! Form::select('tag_list[]', $categories['tags'], null, ['class' => 'tag_list', 'multiple']) !!}
	</div> -->

	<div class="input-field">
		<!--{!! Form::select('technology_list[]', $categories['technologies'], null, ['multiple', 'placeholder' => 'Choose your options']) !!}-->
		<select name="technology_list[]" multiple>
			<option value="" disabled selected>Select relevant technologies...</option>
			@foreach($categories['technologies'] as $id => $technology)
				<option value="{{ $id }}" {{ in_array($id, $selections['technologies']) ? 'selected' : '' }}>{{ $technology }}</option>
			@endforeach
		</select>
		{!! Form::label('technology_list', 'Technologies:') !!}<br />
	</div>
	
	<div class="input-field">
		<!--{!! Form::select('industry_list[]', $categories['industries'], null, ['multiple', 'placeholder' => 'Choose your options']) !!}-->
		<select name="industry_list[]" id="industry_list" multiple>
			<option value="" disabled selected>Select relevant industries...</option>
			@foreach($categories['industries'] as $id => $industry)
				<option value="{{ $id }}" {{ in_array($id, $selections['industries']) ? 'selected' : '' }}>{{ $industry }}</option>
			@endforeach
		</select>
		{!! Form::label('industry_list', 'Industries:') !!}<br />
	</div>

	@for ($i = 1; $i <= count($categories['industries']); $i++)
		<div class="input-field form-indent" id="{{ 'domain_list_'.$i }}">
			{!! Form::select('domain_list[]', $categories['domains'][$i], null, ['id' => 'domain_list_sel_'.$i, 'multiple', 'placeholder' => 'Choose your options']) !!}
			{!! Form::label('domain_list_'.$i, $categories['industries'][$i].' Domains:') !!}<br />
		</div>
	@endfor
</div>

<div class="row">
	<h4 class="center">Restricted Information</h4>
	<p class="center">(General users will not see this information.)</p><br />

	<div class="input-field col s12 m6">
		{!! Form::select('partner_status', [0 => 'No Partnership',1 => 'In Development',2 => 'Active Partner',3 => 'Past Partner'], null) !!}
		{!! Form::label('partner_status', 'Partner Status:') !!}<br />
	</div>

	<div class="input-field col s12 m6">
		{!! Form::select('in_talks', [0 => 'No', 1 => 'Yes'], null) !!}
		{!! Form::label('in_talks', 'In Talks:') !!}<br />
	</div>
</div>

<div class="row center">
	<button class="btn-large waves-effect waves-light" type="submit" name="action">Update Organisation
	    <i class="material-icons left">sync</i>
  	</button>
</div>
<!--<div class="col-md-6">-->
<!--	<div class="input-field">-->
<!--		{!! Form::label('tag_list', 'Tags:') !!}-->
<!--		{!! Form::select('tag_list[]', $categories['tags'], null, ['class' => 'form-control tag_list', 'multiple']) !!}-->
<!--	</div>-->

<!--	<div class="input-field">-->
<!--		{!! Form::label('technology_list', 'Technologies:') !!}-->
<!--		{!! Form::select('technology_list[]', $categories['technologies'], null, ['class' => 'form-control technology_list', 'multiple']) !!}-->
<!--	</div>-->

<!--	<div class="input-field">-->
<!--		{!! Form::label('industry_list', 'Industries:') !!}-->
<!--		{!! Form::select('industry_list[]', $categories['industries'], null, ['class' => 'form-control industry_list', 'multiple']) !!}-->
<!--	</div>-->

<!--	@for ($i = 1; $i <= count($categories['industries']); $i++)-->
<!--		<div class="input-field form-indent" id="{{ 'domain_list_'.$i }}">-->
<!--			{!! Form::label('domain_list_'.$i, $categories['industries'][$i].' Domains:') !!}-->
<!--			{!! Form::select('domain_list[]', $categories['domains'][$i], null, ['id' => 'domain_list_sel_'.$i, 'class' => 'form-control domain_list', 'multiple']) !!}-->
<!--		</div>-->
<!--	@endfor-->
<!--</div>-->
<!-- <div class="row">
	<div class="col s12"><hr></div>
		<div class="input-field center">
			{!! Form::submit($submitText, ['class' => 'btn waves-effect waves-light']) !!}
		</div>
	</div>
</div> -->

<script type="text/javascript">
// edit org logo
$("a#edit_logo").click(function(){
	document.getElementById("new_logo").style.display='block';
	document.getElementById("cur_logo").style.display='none';
});



/*
	// create select2 boxes
	$('.technology_list').select2({ placeholder: 'Select all applicable' });
	$('.industry_list').select2({ placeholder: 'Select all applicable' });
	$('.domain_list').select2({ placeholder: 'Select all applicable' });
	*/
	$('.tag_list').select2({ 
		placeholder: 'Select all applicable, or add your own', 
		tags: true,
		tokenSeparators: [',', ';'],
		minimumInputLength: 1,
    });
 
	
    var industry = $('#industry_list');
    var industryCount = {{ count($categories['industries']) }};
    
    // var industry_selections;
    updateDomains();

    industry.change(function() {
        //var selection = $(this).val();
        updateDomains();
        //showDomain(selection);
    }); 

    function updateDomains() {
    	var selection = industry.val();
    	//console.log(selection);
	    for(var i = 1; i <= industryCount; i++) {
	    	if(selection.indexOf(i.toString()) >= 0) {
	    		document.getElementById("domain_list_"+i).style.display='block';
	    	}
	    	else {
	    		//var domain = $('#domain_list_'+i)[0].options;
	    		var domain = document.getElementById("domain_list_sel_3").options;
	    		//console.log(domain.length);
			    for(var j = 0; j < domain.length; j++){
			    	//console.log(domain[j].selected);
			    	domain[j].selected = false;
			    	//console.log(domain[j].selected);
			    }
	    		document.getElementById("domain_list_"+i).style.display='none';
	    		
			    
	    	}
	    }
    }

	  //  // show previously selected domains - for editing a org
	  //  var prev_selected = industry.val();
	  //  if(prev_selected != null) {
	  //  	for(var i = 0; i < prev_selected.length; i++) {
			// 	document.getElementById("domain_list_"+prev_selected[i]).style.display='block';
			// }
	  //  }
  //  }

  //  function hideDomain(id) {
  //  	document.getElementById("domain_list_"+id).style.display='none';
  //  	$("#domain_list_sel_"+id).select2('val', null);
  //  }

  //  function showDomain(id) {
		// document.getElementById("domain_list_"+id).style.display='block';
  //  }
    
    
 	// industry.on("select2:select", function (e) { 
	// 	var selection = e.params["data"].id;
	// 	showDomain(selection);
	// });

	// industry.on("select2:unselect", function (e) { 
	// 	var unselection = e.params["data"].id;
	// 	hideDomain(unselection);
	// });
</script>