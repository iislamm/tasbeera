<section>
	<div class="section-head">
		<h2 class="section-title">Sign in</h2>
		<p class="section-description"></p>
	</div>
	<form class="form" action="/tasbeera/user/signin" method="POST">
		<div class="area full-width">
			<div class="filled-cover">
				<div class="form-group">
					<label class="form-label">Email</label>
					<input class="input form-control" id="email" name="email" type="email">
					<i class="fas fa-check-circle"></i>
					<i class="fas fa-exclamation-circle"></i>
					<small>error message</small>
				</div>
				<div class="form-group">
					<label class="form-label">password</label>
					<input class="input form-control" id="password" name="password" type="password">
					<i class="fas fa-check-circle"></i>
					<i class="fas fa-exclamation-circle"></i>
					<small>error message</small>
				</div>
				<div class="form-group">
					<button class="btn-style" type="submit">Sign in</button>
				</div>
				<div class="form-link">
					<a class="form-text" href="/tasbeera/user/create">Dont't have an account? create a new one now!</a>
				</div>
			</div>
		</div>
	</form>
</section>
