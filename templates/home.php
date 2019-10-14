<div class="wrap">
	<h2>
		<?php echo $this->name_plugin; ?> - Documentação
		<br>
		<small>A documentação abaixo são escritas apenas para desenvolvedores, ou pessoas que possuem fácil acesso ao código do site que implementar os parâmetros do schema.org do seu website</small>
		<br>
		<small style="color: red;">* Sempre que precisar inserir um código, insira logo no inicio, exemplo: &lt;head&gt; {código} &lt;/head&gt;</small>
	</h2>
	
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#HEAD_BODY" aria-controls="HEAD_BODY" role="tab" data-toggle="tab"><b>HEAD/BODY</b></a>
			</li>
			<li role="presentation">
				<a href="#SINGLE" aria-controls="SINGLE" role="tab" data-toggle="tab"><b>SINGLE.php</b></a>
			</li>
			<li role="presentation">
				<a href="#PAGE" aria-controls="PAGE" role="tab" data-toggle="tab"><b>PAGE.php</b></a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="HEAD_BODY">
				<div class="main_schema">
					<h3>Configurando <b>schema.org</b> em seu site</h3>

					<ol>
						<li>
							Abra ou crie o arquivo head.php, header.php ou index.php em seu tema wordpress e modifique os comandos nas seguintes <b>TAGS:</b>
							<ul>
								<li>
									<p>
										<b>&lt;head&gt; : </b>
										&lt;head&gt; <span>&lt;?=do_shortcode('[e_schema attr="head"]');?&gt;</span> &lt;/head&gt;
									</p>
								</li>
								<li>
									<p>
										<b>&lt;body&gt; : </b>
										&lt;body <span>&lt;?=do_shortcode('[e_schema attr="body"]');?&gt;</span> &gt; ... conteúdo ... 
										&lt;/body&gt;
									</p>
								</li>
							</ul>
						</li>
					</ol>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="SINGLE">
				<div class="main_schema">
					<h3>Configurando <b>schema.org</b> nas páginas internas dos posts
						<br>
						<small>Abra ou crie o arquivo single.php ou single-{post_type}.php em seu tema wordpress e modifique os comandos nas seguintes TAGS:</small>
					</h3>
					

					<ol>
						<li>
							<b>Breadcrumbs</b> são links quase sempre exibidas no topo do site, para mostar ao usuário as migalhas de pão que o levou até a página do <b>POST</b>
							<ul>
								<li>
									<p>
										<b>&lt;ul&gt; : </b>
										&lt;ul <span>&lt;?=do_shortcode('[e_schema attr="breadcrumb"]');?&gt;</span> &gt;
										...
										&lt;/ul&gt;
									</p>
								</li>
								<li>
									<p>
										<b>&lt;li&gt; : </b>
										&lt;li <span>&lt;?=do_shortcode('[e_schema attr="item_breadcrumb"]');?&gt;</span> &gt; 
										&lt;a href=""&gt; ... &lt;/a&gt;
										&lt;/li&gt;
									</p>
								</li>
							</ul>
						</li>
						<li>
							<b>Conteúdo</b> quase sempre exibida no centro da página, sendo o conteúdo principal onde contém titulo, author, imagem e descrição
							<ul>
								<li>
									<p>
										<b>.main : </b> &lt;div class="main"&gt; 
										<span>&lt;?=do_shortcode('[e_schema attr="main"]');?&gt;</span>
										&lt;/div&gt;
									</p>
								</li>
								<li>
									<p>
										<b>&lt;h1&gt; : </b> &lt;h1 
										<span>&lt;?=do_shortcode('[e_schema attr="h1"]');?&gt;</span> &gt;
										...
										&lt;/h1&gt;
									</p>
								</li>
								<li>
									<p>
										<b>.author : </b> &lt;div class="author"
										<span>&lt;?=do_shortcode('[e_schema attr="author"]');?&gt;</span> &gt;
										...
										&lt;/div&gt;
									</p>
								</li>
								<li>
									<p>
										<b>.description : </b> &lt;div class="description"
										<span>&lt;?=do_shortcode('[e_schema attr="description"]');?&gt;</span> &gt;
										...
										&lt;/div&gt;
									</p>
								</li>
							</ul>
						</li>
					</ol>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="PAGE">
				<div class="main_schema">
					<h3>Configurando <b>schema.org</b> nas páginas institucionais como: quem-somos, fale-conosco e termos-de-uso
						<br>
						<small>Abra ou crie o arquivo template-{name_template}.php ou {nome_template}.php em seu tema wordpress e modifique os comandos nas seguintes TAGS:</small>
					</h3>
					

					<ol>
						<li>
							<b>Conteúdo</b> quase sempre exibida no centro da página, sendo o conteúdo principal onde contém titulo, author, imagem e descrição
							<ul>
								<li>
									<p>
										<b>.main : </b> &lt;div class="main"&gt; 
										<span>&lt;?=do_shortcode('[e_schema attr="main"]');?&gt;</span>
										&lt;/div&gt;
									</p>
								</li>
								<li>
									<p>
										<b>&lt;h1&gt; : </b> &lt;h1 
										<span>&lt;?=do_shortcode('[e_schema attr="h1"]');?&gt;</span> &gt;
										...
										&lt;/h1&gt;
									</p>
								</li>
								<li>
									<p>
										<b>.author : </b> &lt;div class="author"
										<span>&lt;?=do_shortcode('[e_schema attr="author"]');?&gt;</span> &gt;
										...
										&lt;/div&gt;
									</p>
								</li>
								<li>
									<p>
										<b>.description : </b> &lt;div class="description"
										<span>&lt;?=do_shortcode('[e_schema attr="description"]');?&gt;</span> &gt;
										...
										&lt;/div&gt;
									</p>
								</li>
							</ul>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.main_schema {
		background: #000;
		color: #fff;
		padding: 30px 15px;
	}
	.main_schema h3 {
		margin-bottom: 30px;
	}
	.main_schema span {
		color: green;
	}
	.main_schema ul {
		list-style: circle;
		margin-left: 30px;
		margin-top: 15px;
	}

	.main_schema ol > li {
		margin-bottom: 60px;
	}
</style>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>