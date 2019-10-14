<div class="wrap">

	<h2><?php echo $this->name_plugin; ?> - Configurações</h2>

	<form action="<?php echo admin_url(); ?>" method="POST" name="<?php echo sanitize_title($this->name_plugin); ?>" enctype="multipart/form-data">
		<input type="hidden" name="page_schema" value="<?php echo $_GET['page']; ?>">
		<table class="form-table">
			<tbody>
				<?php foreach ($fields as $key_field => $field): ?>

					<?php if ($field['type']=='text'){ ?>
						<tr>
							<th scope="row">
								<label for="blogname"><?php echo $field['text']; ?></label>
							</th>
							<td>
								<input name="<?php echo $key_field; ?>" type="text" id="<?php echo $key_field; ?>" value="<?php echo get_option($key_field); ?>" class="regular-text" />
								<p><small><?php echo $field['description']; ?></small></p>
							</td>
						</tr>
					<?php } else if ($field['type']=='textarea'){ ?>
						<tr>
							<th scope="row">
								<label for="blogname"><?php echo $field['text']; ?></label>
							</th>
							<td>
								<textarea name="<?php echo $key_field; ?>" id="<?php echo $key_field; ?>" cols="53" rows="10" style="resize: none; padding: 7px;"><?php echo get_option($key_field); ?></textarea>
								<p><small><?php echo $field['description']; ?></small></p>
							</td>
						</tr>
					<?php } else if ($field['type']=='select'){ ?>
						<tr>
							<th scope="row">
								<label for="blogname"><?php echo $field['text']; ?></label>
							</th>
							<td>
								<select name="<?php echo $key_field; ?>" id="<?php echo $key_field; ?>">
									<?php for ($op=0; $op < count($field['options']); $op++): ?>
										<option <?php if(get_option($key_field)==$field['options'][$op]){echo'selected';} ?> value="<?php echo $field['options'][$op]; ?>">
											<?php echo $field['options'][$op]; ?>
										</option>
									<?php endfor; ?>
								</select>
								<p><small><?php echo $field['description']; ?></small></p>
							</td>
						</tr>

					<?php } else if ($field['type']=='file'){ ?>
						<tr>
							<th scope="row">
								<label for="blogname"><?php echo $field['text']; ?></label>
							</th>
							<td>
								<input id="upload_image_button" type="button" class="button-primary" value="Selecionar imagem" style="margin-bottom: 15px;" />
								<br>
								<img class="img_thumb" src="<?php echo get_option('eschema_logo'); ?>" alt="" style="width: 142px;">
								<input id="eschema_logo" type="hidden" name="eschema_logo" value="<?php echo get_option('eschema_logo'); ?>" />
								<p><small><?php echo $field['description']; ?></small></p>
							</td>
						</tr>

					<?php } ?>

				<?php endforeach; ?>

				<tr>
					<td>
						<p class="submit">
							<input type="submit" name="salvar" id="salvar" class="button button-primary" value="Salvar alterações">
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>