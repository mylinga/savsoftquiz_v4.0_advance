 <div class="container">


 <h3><?php echo $title;?></h3>



  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/new_question_1/'.$nop);?>">

<div class="col-md-8">
<br>
 <div class="login-panel panel panel-default">
		<div class="panel-body">



			<?php
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');
		}
		?>



				<div class="form-group">

<?php echo $this->lang->line('multiple_choice_single_answer');?>
			</div>


			<div class="form-group">
					<label   ><?php echo $this->lang->line('select_category');?></label>
					<select class="form-control"  onchange="onChange('cid')" name="cid" id="cid">
					<?php
					foreach($category_list as $key => $val){
						?>

						<option value="<?php echo $val['cid'];?>"><?php echo $val['category_name'];?></option>
						<?php
					}
					?>
					</select>
			</div>


			<div class="form-group">
					<label   ><?php echo $this->lang->line('select_level');?></label>
					<select class="form-control" name="lid" id="lid" onchange="onChange('lid')">
					<?php
					foreach($level_list as $key => $val){
						?>

						<option value="<?php echo $val['lid'];?>"><?php echo $val['level_name'];?></option>
						<?php
					}
					?>
					</select>
			</div>




			<div class="form-group">
					<label for="inputEmail"  ><?php echo $this->lang->line('question');?></label>
					<textarea  name="question"  class="form-control"   ></textarea>
			</div>
			<div class="form-group">
					<label for="inputEmail"  ><?php echo $this->lang->line('description');?></label>
					<textarea  name="description"  class="form-control"></textarea>
			</div>
		<?php
		for($i=1; $i<=$nop; $i++){
			?>
			<div class="form-group">
					<label for="inputEmail"  ><?php echo $this->lang->line('options');?> <?php echo $i;?>)</label> <br>
					<input type="radio" name="score" value="<?php echo $i-1;?>" <?php if($i==1){ echo 'checked'; } ?> > Select Correct Option
					<br><textarea  name="option[]"  class="form-control"   ></textarea>
			</div>
		<?php
		}
		?>


	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>

		</div>
</div>




</div>
      </form>
</div>


</div>

<script type="text/javascript">

function onChange(name) {
    var x = document.getElementById(name).value;
   localStorage.setItem(name, x);
}


loadvalue("lid");
loadvalue("cid");


 function loadvalue(name){
    var valueToSearch =localStorage.getItem(name);
      $('#' + name + ' option').filter(function(){
            if(valueToSearch== $(this).val())
            {
                $(this).prop('selected', true);
                return true;
            }
        });
}
</script>
