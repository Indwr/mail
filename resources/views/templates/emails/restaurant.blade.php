
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Eboyo</title>
</head>
<body style="margin: 0; padding: 0">
	<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#f1eef8">
		<tbody>
			<tr>
				<td align="center">
					<table width="90%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr>
								<td style="height: 20px;"></td>
							</tr>
							<!-- logo start -->

							<!-- logo end -->
							<!-- banner start -->

							<!-- banner end -->
							<!-- table content start -->
							<tr>
								<td align="center" style="background-color: #fff; padding:10px;">
									<table width="90%" cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<tr>
												<td style="height: 35px;"></td>
											</tr>
											<tr>
												<td style="font-family: Verdana,Geneva,sans-serif; font-size: 28px; line-height: 38px; color: #130b39; font-weight: bold; text-align: center;">Daily Sales Report</td>
											</tr>
											<tr>
												<td style="height: 20px;"></td>
											</tr>
											<tr>
												<td style="font-family: Verdana,Geneva,sans-serif; font-size: 16px; line-height: 26px; color: #3a304e; font-weight: 600;">Dear Restaurant Partner,
</td>
											</tr>
                                            <tr>
												<td style="font-family: Verdana,Geneva,sans-serif; font-size: 16px; line-height: 26px; color: #3a304e; font-weight: normal; text-align: left;">We trust that your experience of using our services has been enjoyable and profitable. Attached is the sales summary of {{ $details['store_name'] }} for date {{ $details['sales_date']}}.

</td>
											</tr>
											<tr>
												<td style="height: 25px;"></td>
											</tr>
											<tr>
											<td>
                                            <div style="overflow: auto;">
													<table width="100%" cellpadding="0" cellspacing="0" border="2" bordercolor="#d9d3f1" style="border-style: solid; min-width:700px;">
														<tbody>
															<tr style="background:#f1eef8;">
																<td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: 600; padding-left: 5px; padding-right: 5px; padding-top: 20px; padding-bottom: 20px; text-align:center;">Count of Orders Served </td>
                                                                <td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: 600; padding-left: 5px; padding-right: 5px; padding-top: 20px; padding-bottom: 20px; text-align:center;">Amount of Orders Served (INR)</td>
<td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: 600; padding-left: 5px; padding-right: 5px; padding-top: 20px; padding-bottom: 20px; text-align:center;">Discount Availed by Customer (INR)</td>
                                                                <td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: 600; padding-left: 5px; padding-right: 5px; padding-top: 20px; padding-bottom: 20px; text-align:center;">Your Earnings for the Day (INR)</td>

																<td style="border-width: 2px; border-style: solid; width: 2px; background-color: #d9d3f1;"></td>

															</tr>
                                                            <tr>
																<td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: normal; padding-left: 5px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px; text-align:center;">{{ $details['count_orders'] }}</td>
                                                                <td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: normal; padding-left: 5px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px; text-align:center;">{{ $details['total_amount_of_orders'] }}</td>
                                                                <td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: normal; padding-left: 5px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px; text-align:center;">{{ $details['discount_by_customer'] }}</td>
                                                                <td width="194" style="border-width: 2px; border-style: solid; font-family: Verdana,Geneva,sans-serif; font-size: 14px; line-height: 24px; color: #130b39; font-weight: normal; padding-left: 5px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px; text-align:center;">{{ round($details['merchant_earnings'], 2) }}</td>


																<td style="border-width: 2px; border-style: solid; width: 2px; background-color: #d9d3f1;"></td>

															</tr>

														</tbody>
													</table>
                                                    </div>
												</td>
											</tr>
                                            <tr>
												<td style="height: 33px;"></td>

											</tr>
											<tr>
												<td style="">We thank you for using our services and take pride in having you as our restaurant partner. Always assuring you of our best services.
</td>
</tr>
<tr>
												<td style="height: 33px;"></td>

											</tr>
                                            <tr>
												<td style="">Best Regards,<br>
Team eBOYO

</td>
</tr>
<td style="height: 33px;"></td>
										</tbody>
									</table>
								</td>
							</tr>
							<!-- table content end-->
							<!-- copyright start -->
							<tr>
								<td>
									<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f1eef8">
										<tbody>
											<tr>
												<td style="height: 25px;"></td>
											</tr>
											<tr>
												<td style="font-family: Verdana,Geneva,sans-serif; font-size: 11px; line-height: 22px; color: #68617a; text-transform: uppercase; font-weight: normal; text-align: center;">
													© 2021 <a href="[_url]" target="_blank" style="text-decoration: none; color: #68617a; text-transform: uppercase;">Powered by</a>  Dot Com Labs LLP
												</td>
											</tr>
											<tr>
												<td style="height: 25px;"></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
