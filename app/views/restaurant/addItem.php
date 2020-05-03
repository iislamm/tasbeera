<section>
	<div class="section-head">
		<h2 class="section-title">Add item</h2>
	</div>
</section>

<form class="form" action="/tasbeera/restaurant/addItem" method="post">
	<div class="area">
		<div class="filled-cover">
			<div class="form-group">
				<label class="form-label">Title</label>
				<input class="input form-control" id="title" name="title" type="text">
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>error message</small>
			</div>
			<div class="form-group">
				<label class="form-label">Description</label>
				<input class="input form-control" id="description" name="description" type="text">
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>error message</small>
			</div>
			<div class="form-group">
				<label class="form-label">Price</label>
				<input class="input form-control" id="price" name="price" type="number">
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>error message</small>
			</div>
			<div class="form-group">
				<label class="form-label">type</label>
				<input class="input form-control" id="type" name="type" type="text">
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>error message</small>
			</div>

			<div class="form-group">
				<input class="btn-style" name="submit" value="Add" type="submit">
			</div>

		</div>
	</div>
</form>