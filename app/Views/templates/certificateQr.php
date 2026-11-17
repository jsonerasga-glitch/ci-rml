<?php
/**
 * QR code for certificate verification, placed in the certificate header
 * between the DOST name block and the PAB logo slot (left: 425pt), so it sits
 * in the same spot on every certificate whether or not the PAB logo is shown.
 *
 * Expects $certificateQr from App\Libraries\CertificateQr::attach().
 */
if (empty($certificateQr['image'])) {
	return;
}
?>
<div style="position: absolute; top: 0; left: 344pt; width: 74pt; height: 76pt; line-height: 1; text-align: center;">
	<img src="<?= $certificateQr['image'] ?>" alt="Verification QR code" width="56" height="56" style="width: 56pt; height: 56pt;">
	<div style="font-size: 5.5pt; color: #333; margin-top: 1pt;">
		<?php if ($certificateQr['isDraft']) : ?><span style="font-weight: bold; color: #b00000;">DRAFT &middot; </span><?php endif; ?>Scan to verify
	</div>
</div>
