<?php $message .= '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#ccc; width:100%\">
	<tbody>
		<tr>
			<td>
			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"padding:5px 20px\">
				<tbody>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href=\"'.base_url().'\"><img alt=\"'.$mail_meta_title.'\" src=\"'.base_url().'images/logo/'.$mail_logo.'\" style=\"border:0px; color:#fa923c; display:block; font-size:0px; line-height:0px; width:150px\" /></a></td>
					</tr>
				</tbody>
			</table>

			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#2b79a9; padding:0px 20px\">
				<tbody>
					<tr>
						<td>
						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"table600\" style=\"width:350px\">
							<tbody>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><strong>Reset Password!</strong></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Hi '.$full_name.',</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>If you didn&#39;t made request to change your '.$mail_email_title.' password recently, please <a href=\"'.base_url().'pages/contact\"><span style=\"color:#800080\">Contact Support</span></a></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><a href=\"'.$reset_url.'\" onclick=\"return false\" rel=\"noreferrer\" style=\"background-color: #4d4c50; color: #ffffff; text-decoration: none; padding: 10px 10px;\">Click To Reset Password </a></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>(OR)</td>
								</tr>
								<tr>
									<td>Copy this below link</td>
								</tr>
								<tr>
									<td>'.$reset_url.'</td>
								</tr>
								<tr>
									<td style=\"text-align:center\">Thanks,</td>
								</tr>
								<tr>
									<td style=\"text-align:center\">'.$mail_email_title.'</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>

			<table cellpadding=\"0\" cellspacing=\"0\" style=\"color:black; margin:0 auto; text-align:center\">
				<tbody>
					<tr>
						<td style=\"text-align:center\">Need help? Mail us at</td>
					</tr>
					<tr>
						<td style=\"text-align:center\"><a href=\"./#NOP\" onclick=\"return false\" rel=\"noreferrer\" style=\"color: black; font-weight: bold; text-decoration: none;\">'.$mail_contact_mail.'</a></td>
					</tr>
					<tr>
						<td style=\"text-align:center\">'.$mail_footer_content.'</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
';  ?>