<?php $__env->startSection('content'); ?>

<!--ovo je za kompanije -->
	<div class = "row">
		<div class="col-md-4 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height">
					<div class="profile-img" style="background-image: url(<?php echo e(asset('img/mistral.jpg')); ?>); margin-bottom: 20px;">
					</div>
				</div>

				<div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height flex-center">
					<a class="btn btn-large btn-green btn-block btn-radius" href="<?php echo e(route('participant.edit')); ?>">
						<i class="fas fa-pencil-alt"></i> Uredi profil
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-xs-12" id="kompanije-info">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading"> Mistral Technologies </div>
				</div>
			</div>
			<div class="row basic-info">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<i class="far fa-calendar-alt"></i> 03.10.1997 <br/> 
					<i class="fas fa-map-marker"></i> &nbsp; Sarajevo, Milana Preloga 15 <br/> 
					<i class="fas fa-phone"></i> 060 319 1256 <br/> 
					<i class="far fa-envelope"></i> adipa@mistraltechonologies.com <br/> <br/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 flex-row_nowrap">
				<span class="section-title">
					spašeni participanti
				</span>
			<div class="section-title_line"></div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.participants', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>