<?php 
	if(($k+3)<$max) {
		$CHT=$k+3;}
		else{$CHT=$max;}

		if ($k<$max){

	
for($k;$k<$CHT;$k++){
     foreach ($result as $row) : 
      
      
    ?>
              <div class="container-fluid element_ev">
                    <div class="row-fluid">
                            <div class="col-md-1" id="date">
                              <p class="date_ev"><i><?=  $row['created_date'] ?></i></p> 
                            </div><br>
                    </div>
                      <div class="row-fluid"> 
                            <div class="col-md-6" >
                              <p class="top_ev"><?= $row['title'] ?></p>
                            </div>
                      </div>
                       <div class="row-fluid"> 
                        <div class="col-md-8" id="image">
                              <img src="<?= $row['img'] ?>">
                            </div>
                            
                        </div>
                        <div class="row-fluid"> 
                          <div class="col-md-12" id="overflow">
                              <p class="text_ev"><?= $row['body'] ?></p>
                            </div>
                        </div> 
                        <div class="row-fluid">
                            <div class="col-md-offset-10 col-md-8" id="button">
                                  <a href="<?= $row['link'] ?>" class="btn btn-default btn-lg active" role="button">Детально</a>
                            </div>
                      </div>
                      </div>
            
   <br>
   <?php endforeach;}} ?>