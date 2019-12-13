<?php include __DIR__ . '/includes/menu.php'; ?>

<div class="page-header">
	<h1><?= __('Settings', 'axima-payment-gateway') ?></h1>
</div>

<form class="form-horizontal" method="post">
	<div class="col-sm-12">
		<div class="form-group">
			<label for="form-merchant-id" class="col-sm-2 control-label"><?= __('Merchant ID', 'axima-payment-gateway') ?></label>
			<div class="col-sm-10">
				<input type="text" name="merchant-id" id="form-merchant-id" class="form-control" value="<?= isset($settings['merchantId']) ? $settings['merchantId'] : '' ?>">
				<p class="help-block"><?= __('Your merchant ID for pays.cz service', 'axima-payment-gateway') ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="form-shop-id" class="col-sm-2 control-label">Shop ID</label>
			<div class="col-sm-10">
				<input type="text" name="shop-id" id="form-shop-id" class="form-control" value="<?= isset($settings['shopId']) ? $settings['shopId'] : '' ?>">
				<p class="help-block"><?= __('Your shop ID for pays.cz service', 'axima-payment-gateway') ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="form-hash-password" class="col-sm-2 control-label"><?= __('Hash password', 'axima-payment-gateway') ?></label>
			<div class="col-sm-10">
				<input type="password" name="hash-password" id="form-hash-password" class="form-control" autocomplete="off">
				<p class="help-block"><?= __('Password for verifying requests from payment gate. You should get this password with your contract.', 'axima-payment-gateway') ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="form-confirm-url" class="col-sm-2 control-label"><?= __('Confirmation URL', 'axima-payment-gateway') ?></label>
			<div class="col-sm-10">
				<input type="text" name="confirm-url" id="form-confirm-url" class="form-control" readonly value="<?= get_site_url(NULL, 'wp-admin/admin-ajax.php?action=pays-confirmation') ?>">
				<p class="help-block"><?= __('Copy this URL to your settings in pays.cz administration to confirmation URL field.', 'axima-payment-gateway') ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Success payment page', 'axima-payment-gateway') ?></label>
			<div class="col-sm-5">
				<select name="success-url" data-change="#ok-url" class="form-control">
					<?php foreach ($pages as $url => $page): ?>
						<option value="<?= $url ?>"<?php if (isset($settings['success-url']) && $url === $settings['success-url']): ?> selected<?php endif; ?>><?= $page ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-sm-5">
				<input type="text" id="ok-url" name="success-url-preview" class="form-control" readonly value="<?= isset($settings['success-url']) ? $settings['success-url'] : '' ?>">
				<p class="help-block"><?= __('Copy this URL to your settings in pays.cz administration to success payment URL field.', 'axima-payment-gateway') ?></p>
			</div>
		</div>
        <div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Offline payment page', 'axima-payment-gateway') ?></label>
			<div class="col-sm-5">
				<select name="offline-url" data-change="#offline-url" class="form-control">
					<?php foreach ($pages as $url => $page): ?>
						<option value="<?= $url ?>"<?php if (isset($settings['offline-url']) && $url === $settings['offline-url']): ?> selected<?php endif; ?>><?= $page ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-sm-5">
				<input type="text" id="offline-url" name="offline-url-preview" class="form-control" readonly value="<?= isset($settings['offline-url']) ? $settings['offline-url'] : '' ?>">
				<p class="help-block"><?= __('Copy this URL to your settings in pays.cz administration to offline payment URL field.', 'axima-payment-gateway') ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Failed payment page', 'axima-payment-gateway') ?></label>
			<div class="col-sm-5">
				<select name="error-url" data-change="#error-url" class="form-control">
					<?php foreach ($pages as $url => $page): ?>
						<option value="<?= $url ?>"<?php if (isset($settings['error-url']) && $url === $settings['error-url']): ?> selected<?php endif; ?>><?= $page ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-sm-5">
				<input type="text" id="error-url" name="error-url-preview" class="form-control" readonly value="<?= isset($settings['error-url']) ? $settings['error-url'] : '' ?>">
				<p class="help-block"><?= __('Copy this URL to your settings in pays.cz administration to failed payment URL field.', 'axima-payment-gateway') ?></p>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" name="_submit" class="btn btn-primary"><?= __('Save', 'axima-payment-gateway') ?></button>
				<a href="?page=<?= $domain ?>" class="btn btn-default"><?= __('Cancel', 'axima-payment-gateway') ?></a>
			</div>
		</div>
	</div>
</form>

<script>
	(function ($) {
		$(function () {
			$('[data-change]').on('change', function () {
				$($(this).data('change')).val($(this).val());
			});
		});
	})(jQuery);
</script>
