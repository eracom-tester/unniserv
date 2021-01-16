SELECT *
FROM `advanced_info`
WHERE `title` = 'Registration' 
 Execution Time:0.00049400329589844

SELECT `id`, `name`
FROM `users`
WHERE `username` = 'demo' 
 Execution Time:0.00027894973754883

SELECT *
FROM `advanced_info`
WHERE `title` = 'Registration' 
 Execution Time:0.0003819465637207

SELECT `id`, `name`
FROM `users`
WHERE `username` = 'demo' 
 Execution Time:0.0030219554901123

SELECT `id`
FROM `users`
WHERE `mobile` = '8427984020' 
 Execution Time:0.00028300285339355

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00032711029052734

SELECT `id`
FROM `users`
WHERE `email` = 'kamaljitone@gmail.com' 
 Execution Time:0.00030517578125

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00034213066101074

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00063610076904297

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00064802169799805

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00031089782714844

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00020813941955566

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00022196769714355

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.0001978874206543

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00017404556274414

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00049805641174316

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.074115037918091

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00049090385437012

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00063490867614746

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00073409080505371

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.046941995620728

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00069499015808105

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00087213516235352

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00089788436889648

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.046455144882202

SELECT `id`
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.0003659725189209

SELECT *
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00041985511779785

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00031185150146484

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00067496299743652

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00034999847412109

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00075507164001465

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00028014183044434

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00033903121948242

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00030994415283203

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00031900405883789

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.0013298988342285

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00040483474731445

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00029110908508301

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00029993057250977

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00032401084899902

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00023484230041504

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00026822090148926

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00028395652770996

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0003058910369873

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00040102005004883

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00032281875610352

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00028300285339355

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00025105476379395

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00023293495178223

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00022602081298828

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00030112266540527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00028204917907715

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00030303001403809

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00026392936706543

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00031900405883789

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00028109550476074

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00027990341186523

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.000244140625

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00048995018005371

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00058889389038086

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00061607360839844

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00023007392883301

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00024008750915527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00023388862609863

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00026798248291016

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00024580955505371

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00026297569274902

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00025796890258789

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.001323938369751

SELECT *
FROM `transaction`
WHERE   (
`u_code` = '3'
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00057888031005859

SELECT COUNT(*) AS `numrows`
FROM `transaction`
WHERE   (
`u_code` = '3'
 ) 
 Execution Time:0.00025296211242676

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00034499168395996

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00024080276489258

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021696090698242

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.003018856048584

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0008690357208252

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00031018257141113

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00020408630371094

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015902519226074

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00017905235290527

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00028300285339355

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00028109550476074

SELECT *
FROM `users`
WHERE   (
`id` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29')
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00044798851013184

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`id` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29')
 ) 
 Execution Time:0.00021195411682129

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '20' 
 Execution Time:0.00028586387634277

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020813941955566

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.0001370906829834

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018000602722168

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '22' 
 Execution Time:0.0001218318939209

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016021728515625

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '23' 
 Execution Time:0.0001070499420166

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015711784362793

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '24' 
 Execution Time:0.00010514259338379

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00017094612121582

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '25' 
 Execution Time:0.00012516975402832

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020289421081543

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '26' 
 Execution Time:0.00012302398681641

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0001680850982666

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '27' 
 Execution Time:0.00012993812561035

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016212463378906

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '28' 
 Execution Time:0.00010991096496582

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016403198242188

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '29' 
 Execution Time:0.00010490417480469

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015497207641602

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00031113624572754

SELECT *
FROM `users`
WHERE   (
`id` IN('26', '23', '29', '21', '22', '28', '24', '25', '27', '20')
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.0005490779876709

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`id` IN('26', '23', '29', '21', '22', '28', '24', '25', '27', '20')
 ) 
 Execution Time:0.00030112266540527

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00031208992004395

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00023508071899414

SELECT *
FROM `users`
WHERE   (
`id` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29')
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00040912628173828

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`id` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29')
 ) 
 Execution Time:0.00021195411682129

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '20' 
 Execution Time:0.00071382522583008

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020694732666016

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00015497207641602

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021696090698242

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '22' 
 Execution Time:0.00017499923706055

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00022101402282715

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '23' 
 Execution Time:0.00017309188842773

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019502639770508

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '24' 
 Execution Time:0.00014305114746094

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018596649169922

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '25' 
 Execution Time:0.00013995170593262

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018501281738281

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '26' 
 Execution Time:0.00015091896057129

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018095970153809

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '27' 
 Execution Time:0.00014710426330566

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00017595291137695

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '28' 
 Execution Time:0.00014209747314453

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016617774963379

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '29' 
 Execution Time:0.00012302398681641

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016903877258301

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00037717819213867

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00033307075500488

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00031089782714844

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.0019431114196777

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00029087066650391

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00027894973754883

SELECT `pin_rate`, `pin_type`
FROM `pin_details`
WHERE `status` = 1 
 Execution Time:0.035545825958252

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00029206275939941

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00028800964355469

SELECT *
FROM `users`
WHERE   (
`id` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29')
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00033402442932129

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`id` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29')
 ) 
 Execution Time:0.0001828670501709

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '20' 
 Execution Time:0.00023889541625977

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021004676818848

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00016093254089355

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021100044250488

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '22' 
 Execution Time:0.00015807151794434

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0001988410949707

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '23' 
 Execution Time:0.00025200843811035

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00039100646972656

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '24' 
 Execution Time:0.00023508071899414

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0002901554107666

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '25' 
 Execution Time:0.00063300132751465

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00022220611572266

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '26' 
 Execution Time:0.00016283988952637

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019598007202148

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '27' 
 Execution Time:0.00015497207641602

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019407272338867

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '28' 
 Execution Time:0.00014686584472656

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019097328186035

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '29' 
 Execution Time:0.00012516975402832

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0001680850982666

SELECT *
FROM `users`
WHERE   (
`u_sponsor` = '3'
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00040292739868164

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`u_sponsor` = '3'
 ) 
 Execution Time:0.00034499168395996

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '20' 
 Execution Time:0.00025105476379395

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021100044250488

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00015997886657715

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020980834960938

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '22' 
 Execution Time:0.00016903877258301

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020003318786621

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '23' 
 Execution Time:0.00014805793762207

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019097328186035

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '24' 
 Execution Time:0.00012588500976562

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016903877258301

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '25' 
 Execution Time:0.0001220703125

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0001678466796875

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '26' 
 Execution Time:0.00012397766113281

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00014209747314453

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '27' 
 Execution Time:0.00012683868408203

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016522407531738

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '28' 
 Execution Time:0.00012707710266113

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016593933105469

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '29' 
 Execution Time:0.00010991096496582

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0001518726348877

SELECT *
FROM `pin_history`
WHERE   (
`user_id` = '3'
 )
ORDER BY `id` ASC
 LIMIT 25 
 Execution Time:0.029654979705811

SELECT COUNT(*) AS `numrows`
FROM `pin_history`
WHERE   (
`user_id` = '3'
 ) 
 Execution Time:0.00028395652770996

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00030398368835449

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021600723266602

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020289421081543

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00024318695068359

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00023484230041504

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00022482872009277

SELECT *
FROM `transaction`
WHERE   (
`u_code` = '3'
AND `tx_type` = 'income'
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00043416023254395

SELECT COUNT(*) AS `numrows`
FROM `transaction`
WHERE   (
`u_code` = '3'
AND `tx_type` = 'income'
 ) 
 Execution Time:0.00030803680419922

SELECT *
FROM `wallet_types`
WHERE `wallet_type` = 'income' and `status` = 1 
 Execution Time:0.00031614303588867

SELECT SUM(amount) as amnt
FROM `transaction`
WHERE `u_code` = '3' and `source` = 'direct'  
 Execution Time:0.0001990795135498

SELECT SUM(amount) as amnt
FROM `transaction`
WHERE `u_code` = '3' and `source` = 'level'  
 Execution Time:0.00017404556274414

SELECT SUM(amount) as amnt
FROM `transaction`
WHERE `u_code` = '3' and `source` = 'residual'  
 Execution Time:0.00017094612121582

SELECT SUM(amount) as amnt
FROM `transaction`
WHERE `u_code` = '3' and `source` = 'reward'  
 Execution Time:0.00017905235290527

SELECT SUM(amount) as amnt
FROM `transaction`
WHERE `u_code` = '3' and `source` = 'roi'  
 Execution Time:0.00019001960754395

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021100044250488

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00020503997802734

SELECT *
FROM `transaction`
WHERE   (
`u_code` = '3'
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00066804885864258

SELECT COUNT(*) AS `numrows`
FROM `transaction`
WHERE   (
`u_code` = '3'
 ) 
 Execution Time:0.00030207633972168

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00027799606323242

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020718574523926

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016188621520996

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019001960754395

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018811225891113

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00019192695617676

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00018906593322754

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018596649169922

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019383430480957

SELECT *
FROM `advanced_info`
WHERE `title` = 'Registration' 
 Execution Time:0.00047993659973145

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.074728012084961

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00037908554077148

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025796890258789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020503997802734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024008750915527

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022411346435547

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025200843811035

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00025391578674316

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00018095970153809

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.0001678466796875

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016307830810547

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.0001530647277832

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00016212463378906

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00016689300537109

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00020480155944824

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00015878677368164

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00017309188842773

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00016307830810547

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00017094612121582

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00016307830810547

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00016903877258301

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.0001530647277832

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00016498565673828

SELECT `id`
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00011491775512695

SELECT *
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00017094612121582

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00016999244689941

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00013589859008789

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001380443572998

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00016999244689941

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00014710426330566

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00015902519226074

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00015902519226074

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014615058898926

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00013303756713867

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00015401840209961

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00012898445129395

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015997886657715

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00045180320739746

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00056600570678711

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00039887428283691

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00025510787963867

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021100044250488

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00015711784362793

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00015807151794434

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00016212463378906

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00013399124145508

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014305114746094

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.0001370906829834

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00014400482177734

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00014591217041016

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00013899803161621

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00010895729064941

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00023293495178223

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00020408630371094

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016403198242188

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00020790100097656

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00019288063049316

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00017809867858887

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00013303756713867

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00014495849609375

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00015497207641602

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00015902519226074

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001530647277832

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00014400482177734

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00017189979553223

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00015807151794434

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.00024509429931641

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020790100097656

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00037980079650879

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002591609954834

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020384788513184

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024199485778809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002140998840332

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025606155395508

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00023388862609863

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00018000602722168

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.0001678466796875

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017404556274414

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00016188621520996

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.0002140998840332

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00016307830810547

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00020790100097656

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00018095970153809

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00020217895507812

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00017094612121582

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00017404556274414

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00016307830810547

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00017809867858887

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00015807151794434

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00017094612121582

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00016498565673828

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.0001680850982666

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00016403198242188

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00016880035400391

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00018215179443359

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013995170593262

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015902519226074

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015687942504883

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001530647277832

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015807151794434

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015020370483398

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018906593322754

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00034499168395996

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026488304138184

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020217895507812

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024318695068359

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019311904907227

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00026202201843262

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00053286552429199

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00040292739868164

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00098586082458496

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00026583671569824

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00019097328186035

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.0001671314239502

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00016593933105469

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00014996528625488

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00017404556274414

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00014901161193848

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00013089179992676

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00013613700866699

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00013613700866699

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00014805793762207

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00013494491577148

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00014305114746094

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.0001518726348877

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00014209747314453

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00020003318786621

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00020194053649902

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020313262939453

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.0001828670501709

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00019192695617676

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00019598007202148

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00022196769714355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00019216537475586

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016498565673828

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016403198242188

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00015592575073242

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00016593933105469

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00013899803161621

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016212463378906

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016379356384277

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00015115737915039

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.0001678466796875

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00017118453979492

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016307830810547

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0002598762512207

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.0002288818359375

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00019502639770508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00019192695617676

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001671314239502

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00033187866210938

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00031495094299316

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00031709671020508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.0002291202545166

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001671314239502

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027585029602051

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00039291381835938

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026702880859375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020217895507812

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027203559875488

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT `id`
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00021100044250488

SELECT *
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00023889541625977

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023198127746582

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031399726867676

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026607513427734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017786026000977

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027704238891602

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019407272338867

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00028204917907715

SELECT *
FROM `user_accounts`
WHERE `status` = '1' and `u_code` = '3' 
 Execution Time:0.00022387504577637

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.0002291202545166

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023889541625977

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031900405883789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026416778564453

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.000244140625

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017714500427246

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020217895507812

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00023198127746582

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00020694732666016

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017189979553223

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016307830810547

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017309188842773

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00029492378234863

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00024199485778809

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00017714500427246

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00037717819213867

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00029087066650391

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.0002140998840332

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00018715858459473

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00019097328186035

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00017404556274414

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00019598007202148

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.0001680850982666

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00018215179443359

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00012803077697754

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00015497207641602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00014805793762207

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.0001528263092041

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.0001528263092041

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001678466796875

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00017905235290527

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016498565673828

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00016093254089355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00017309188842773

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00015807151794434

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015401840209961

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001518726348877

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00011610984802246

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00015401840209961

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00015687942504883

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014805793762207

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014996528625488

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00011491775512695

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00015592575073242

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.0001518726348877

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014710426330566

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00013995170593262

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00014996528625488

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00015592575073242

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014686584472656

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012922286987305

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.0001368522644043

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00015807151794434

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.0001518726348877

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015020370483398

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020003318786621

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00034117698669434

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026583671569824

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0013082027435303

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00039792060852051

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021600723266602

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019407272338867

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00029397010803223

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00028491020202637

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00021004676818848

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00018000602722168

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00018596649169922

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00017189979553223

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016283988952637

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00016093254089355

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00015497207641602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00016999244689941

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00017094612121582

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00014805793762207

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.0001530647277832

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00015091896057129

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00018000602722168

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00018000602722168

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00018882751464844

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00017309188842773

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00016999244689941

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00015997886657715

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.0001680850982666

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00016903877258301

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013208389282227

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00014400482177734

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001530647277832

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00015711784362793

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00016403198242188

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00016379356384277

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015497207641602

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001530647277832

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00013899803161621

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00013589859008789

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00015807151794434

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015711784362793

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00013995170593262

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00016117095947266

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00015497207641602

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014996528625488

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014901161193848

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00011801719665527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00014686584472656

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00015592575073242

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014805793762207

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015091896057129

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00013494491577148

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00015711784362793

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00015091896057129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00070691108703613

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003199577331543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026607513427734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020503997802734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026607513427734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020813941955566

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019097328186035

SELECT `id`
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00021195411682129

SELECT *
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00023698806762695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024604797363281

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00049400329589844

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00046205520629883

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020694732666016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024890899658203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001981258392334

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020694732666016

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.0003209114074707

SELECT *
FROM `user_accounts`
WHERE `status` = '1' and `u_code` = '3' 
 Execution Time:0.00022721290588379

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.0002291202545166

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023484230041504

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00032305717468262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002598762512207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001990795135498

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024890899658203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001680850982666

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025796890258789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003209114074707

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026512145996094

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020480155944824

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00041103363037109

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00044512748718262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00045299530029297

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00032997131347656

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022292137145996

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00023198127746582

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00022792816162109

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00022101402282715

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.0001838207244873

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00020980834960938

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00020408630371094

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00022602081298828

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023698806762695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00030994415283203

SELECT *
FROM `users`
WHERE   (
`u_sponsor` = '3'
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00037002563476562

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`u_sponsor` = '3'
 ) 
 Execution Time:0.00017809867858887

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019001960754395

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017189979553223

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017499923706055

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022506713867188

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017595291137695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017499923706055

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '20' 
 Execution Time:0.00019097328186035

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019502639770508

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00012588500976562

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00018405914306641

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '22' 
 Execution Time:0.00013518333435059

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00016093254089355

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '23' 
 Execution Time:0.00012803077697754

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015687942504883

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '24' 
 Execution Time:0.00010919570922852

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015592575073242

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '25' 
 Execution Time:0.00012016296386719

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015497207641602

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '26' 
 Execution Time:0.00011110305786133

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015687942504883

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '27' 
 Execution Time:0.00010800361633301

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00017380714416504

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '28' 
 Execution Time:9.5129013061523E-5

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015902519226074

SELECT `u_sponsor`
FROM `users`
WHERE `id` = '29' 
 Execution Time:0.00010895729064941

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00015592575073242

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021004676818848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00036096572875977

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00028109550476074

SELECT *
FROM `users`
WHERE   (
`id` IN('26', '23', '29', '21', '22', '28', '24', '25', '27', '20')
 )
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.00033712387084961

SELECT COUNT(*) AS `numrows`
FROM `users`
WHERE   (
`id` IN('26', '23', '29', '21', '22', '28', '24', '25', '27', '20')
 ) 
 Execution Time:0.00018405914306641

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019598007202148

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019311904907227

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00052595138549805

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002589225769043

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001990795135498

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025391578674316

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00032305717468262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00028610229492188

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022196769714355

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024890899658203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020217895507812

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020790100097656

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025296211242676

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00020408630371094

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00019192695617676

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00017404556274414

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00018310546875

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00017118453979492

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016522407531738

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.0001671314239502

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00016498565673828

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00016593933105469

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00018405914306641

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00016498565673828

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00016999244689941

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00015807151794434

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00017189979553223

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00015783309936523

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00017213821411133

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00016283988952637

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00016903877258301

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00015091896057129

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00016903877258301

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00020694732666016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016093254089355

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.0001380443572998

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012707710266113

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00015091896057129

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00040817260742188

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00099086761474609

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024795532226562

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021600723266602

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00016093254089355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00016903877258301

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00017499923706055

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016093254089355

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00013399124145508

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00013494491577148

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00015091896057129

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00014400482177734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014281272888184

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012302398681641

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00013303756713867

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00014305114746094

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00014805793762207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013995170593262

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014901161193848

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00012993812561035

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014185905456543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014209747314453

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019001960754395

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031399726867676

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026082992553711

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00045585632324219

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029706954956055

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024199485778809

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' 
 Execution Time:0.00024986267089844

SELECT COUNT(id) as total
FROM `users`
WHERE 1 = 1 
 Execution Time:0.00018000602722168

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' and DATE(active_date) = DATE('2020-04-30') 
 Execution Time:0.00022387504577637

SELECT COUNT(id) as total
FROM `users`
WHERE DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00019001960754395

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' 
 Execution Time:0.00042891502380371

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' and DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00037002563476562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031685829162598

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00039505958557129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027704238891602

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024914741516113

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021910667419434

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019288063049316

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018715858459473

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021886825561523

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019407272338867

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002439022064209

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001988410949707

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018787384033203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023913383483887

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019407272338867

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019001960754395

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017213821411133

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015783309936523

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016307830810547

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018000602722168

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031304359436035

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026702880859375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001981258392334

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024604797363281

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019216537475586

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018501281738281

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00028896331787109

SELECT `id`
FROM `users`
WHERE `id` > ''  
 Execution Time:0.00030112266540527

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '' and `active_status` = '1' 
 Execution Time:0.00018095970153809

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '' and `active_status` = 1 
 Execution Time:0.00014185905456543

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN(NULL) 
 Execution Time:0.00015711784362793

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00014781951904297

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '' 
 Execution Time:0.00015497207641602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '' and `slug` = 'total_directs' 
 Execution Time:0.00021791458129883

INSERT INTO `wallets` (`u_code`, `status`, `value`, `slug`) VALUES (NULL, 1, 1, 'total_directs') 
 Execution Time:0.060445070266724

SELECT `id`
FROM `wallets`
WHERE `u_code` = '' and `slug` = 'active_directs' 
 Execution Time:0.00025391578674316

INSERT INTO `wallets` (`u_code`, `status`, `value`, `slug`) VALUES (NULL, 1, 0, 'active_directs') 
 Execution Time:0.043397188186646

SELECT `id`
FROM `wallets`
WHERE `u_code` = '' and `slug` = 'my_gen' 
 Execution Time:0.00040006637573242

INSERT INTO `wallets` (`u_code`, `status`, `value`, `slug`) VALUES (NULL, 1, 0, 'my_gen') 
 Execution Time:0.030555009841919

SELECT `id`
FROM `wallets`
WHERE `u_code` = '' and `slug` = 'active_gen' 
 Execution Time:0.0004279613494873

INSERT INTO `wallets` (`u_code`, `status`, `value`, `slug`) VALUES (NULL, 1, 0, 'active_gen') 
 Execution Time:0.089766025543213

SELECT `id`
FROM `wallets`
WHERE `u_code` = '' and `slug` = 'single_leg_team' 
 Execution Time:0.00088906288146973

INSERT INTO `wallets` (`u_code`, `status`, `value`, `slug`) VALUES (NULL, 1, 13, 'single_leg_team') 
 Execution Time:0.074534893035889

SELECT `id`
FROM `wallets`
WHERE `u_code` = '' and `slug` = 'active_single_leg' 
 Execution Time:0.00081086158752441

INSERT INTO `wallets` (`u_code`, `status`, `value`, `slug`) VALUES (NULL, 1, 0, 'active_single_leg') 
 Execution Time:0.024049043655396

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '' and `status` = '1' 
 Execution Time:0.00082612037658691

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00055694580078125

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00072884559631348

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00055408477783203

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` IS NULL
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00065493583679199

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00058698654174805

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00057506561279297

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00053691864013672

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00096893310546875

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` IS NULL
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.0013530254364014

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00062108039855957

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00054001808166504

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00055408477783203

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0005490779876709

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` IS NULL
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00050902366638184

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00054383277893066

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.0005638599395752

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00055885314941406

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00054287910461426

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` IS NULL
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00049901008605957

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00053095817565918

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00057196617126465

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00053787231445312

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00055980682373047

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` IS NULL
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00046300888061523

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00059390068054199

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` IS NULL
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00053620338439941

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00084400177001953

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00083208084106445

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00030994415283203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026106834411621

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026392936706543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018715858459473

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017213821411133

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018906593322754

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018620491027832

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018095970153809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00077104568481445

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00049114227294922

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00081300735473633

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00043988227844238

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021791458129883

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017976760864258

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024199485778809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024199485778809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018692016601562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003211498260498

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026392936706543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026512145996094

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019097328186035

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019407272338867

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018692016601562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019311904907227

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023698806762695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018692016601562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001838207244873

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018310546875

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00044608116149902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00038504600524902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00091195106506348

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027298927307129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00035691261291504

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00030088424682617

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024008750915527

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013113021850586

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00011801719665527

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00020694732666016

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00013113021850586

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00010395050048828

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:9.7990036010742E-5

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00010299682617188

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:9.7036361694336E-5

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:9.2029571533203E-5

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:9.3221664428711E-5

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:9.1075897216797E-5

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00012898445129395

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00015687942504883

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00051188468933105

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00035500526428223

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00019407272338867

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00019311904907227

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00071001052856445

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00019001960754395

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.0001680850982666

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00015616416931152

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00013494491577148

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00014019012451172

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00013303756713867

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001368522644043

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00010991096496582

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012612342834473

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00012588500976562

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.0001380443572998

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00013113021850586

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00012493133544922

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012493133544922

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00013113021850586

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00013208389282227

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00013589859008789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00012397766113281

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012588500976562

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00011301040649414

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00012898445129395

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00012683868408203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014305114746094

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00011992454528809

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00011706352233887

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00012493133544922

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00013017654418945

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00011992454528809

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001227855682373

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00011086463928223

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00015711784362793

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014185905456543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013017654418945

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018000602722168

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003199577331543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023603439331055

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031113624572754

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026392936706543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020503997802734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023603439331055

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' 
 Execution Time:0.00024199485778809

SELECT COUNT(id) as total
FROM `users`
WHERE 1 = 1 
 Execution Time:0.00017094612121582

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' and DATE(active_date) = DATE('2020-04-30') 
 Execution Time:0.00017714500427246

SELECT COUNT(id) as total
FROM `users`
WHERE DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00017809867858887

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' 
 Execution Time:0.00021481513977051

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' and DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00018692016601562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026798248291016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003209114074707

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00077915191650391

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00065779685974121

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025010108947754

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027298927307129

SELECT `pin_rate`, `pin_type`
FROM `pin_details`
WHERE `status` = 1 
 Execution Time:0.00026416778564453

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.000244140625

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00038909912109375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026297569274902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023698806762695

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' 
 Execution Time:0.00023579597473145

SELECT COUNT(id) as total
FROM `users`
WHERE 1 = 1 
 Execution Time:0.00017595291137695

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' and DATE(active_date) = DATE('2020-04-30') 
 Execution Time:0.00019598007202148

SELECT COUNT(id) as total
FROM `users`
WHERE DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00020909309387207

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' 
 Execution Time:0.00018405914306641

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' and DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00017404556274414

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026202201843262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031709671020508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026392936706543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024509429931641

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020790100097656

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00026106834411621

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00023293495178223

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017213821411133

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016093254089355

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00012993812561035

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00016403198242188

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.0001528263092041

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.0001518726348877

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.0001218318939209

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00021004676818848

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00020599365234375

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00017786026000977

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00018692016601562

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00018000602722168

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00018501281738281

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00014305114746094

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00021600723266602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00091290473937988

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00096297264099121

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00029110908508301

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00024199485778809

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.0004279613494873

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031709671020508

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00019097328186035

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00019598007202148

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00019502639770508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00020408630371094

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00022506713867188

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018811225891113

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017309188842773

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00016307830810547

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00016999244689941

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00014996528625488

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014185905456543

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015997886657715

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00012993812561035

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00018787384033203

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00015997886657715

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001530647277832

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014901161193848

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00019979476928711

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00021791458129883

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00026392936706543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023698806762695

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00022792816162109

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00015091896057129

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00015497207641602

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014495849609375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013089179992676

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003819465637207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027990341186523

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020813941955566

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029516220092773

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021696090698242

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019598007202148

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025486946105957

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00023293495178223

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00019001960754395

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016903877258301

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017690658569336

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00017285346984863

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016403198242188

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00015997886657715

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00015616416931152

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.0001828670501709

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00019311904907227

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00014090538024902

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00017619132995605

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00016212463378906

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00017881393432617

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00016093254089355

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00017714500427246

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00020098686218262

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00047111511230469

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00057482719421387

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.0011358261108398

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.0010011196136475

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026893615722656

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.0003209114074707

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00025796890258789

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.0002439022064209

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00022196769714355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00021004676818848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020003318786621

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020599365234375

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.0001990795135498

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00020790100097656

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00019979476928711

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018405914306641

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00018215179443359

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00016999244689941

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.0001838207244873

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00017404556274414

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017189979553223

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001828670501709

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.0002739429473877

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.0003659725189209

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00021004676818848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015997886657715

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00019502639770508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00031709671020508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00017404556274414

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014710426330566

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00028014183044434

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0015990734100342

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029802322387695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025105476379395

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001988410949707

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019192695617676

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00022983551025391

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.0002140998840332

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017690658569336

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00020480155944824

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00020194053649902

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00015401840209961

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016093254089355

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00012683868408203

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00011301040649414

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00018501281738281

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00019693374633789

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00018620491027832

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00018596649169922

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00025391578674316

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00019216537475586

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00014090538024902

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00014591217041016

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00013589859008789

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00014209747314453

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00014400482177734

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00016498565673828

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.0001521110534668

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014591217041016

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.0001370906829834

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014591217041016

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00016379356384277

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.0001530647277832

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014686584472656

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014996528625488

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00015902519226074

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00016903877258301

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00022101402282715

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021505355834961

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00019311904907227

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00020503997802734

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00019717216491699

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019288063049316

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00019502639770508

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00021600723266602

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.0020558834075928

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00046706199645996

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021791458129883

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00022697448730469

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00018715858459473

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00020503997802734

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.0001978874206543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023794174194336

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00036120414733887

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027298927307129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022292137145996

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024914741516113

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020694732666016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025606155395508

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00020503997802734

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017094612121582

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016999244689941

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017595291137695

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00021004676818848

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00046014785766602

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00050902366638184

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00085306167602539

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00028204917907715

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00023102760314941

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.0001990795135498

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00020694732666016

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00019001960754395

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00021600723266602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00018906593322754

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00020098686218262

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00017690658569336

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.0001671314239502

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00020790100097656

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00017213821411133

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00016188621520996

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.0001368522644043

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014805793762207

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00014710426330566

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00018620491027832

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00012612342834473

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015401840209961

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001518726348877

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00013613700866699

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00014781951904297

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00013399124145508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016212463378906

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017595291137695

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00014400482177734

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00015687942504883

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00014996528625488

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014686584472656

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014400482177734

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00014805793762207

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00012779235839844

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00018191337585449

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016403198242188

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015401840209961

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00011205673217773

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00022101402282715

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00020313262939453

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015616416931152

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00033116340637207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026798248291016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020503997802734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024199485778809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020289421081543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019192695617676

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025391578674316

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.0001978874206543

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017309188842773

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00017094612121582

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017189979553223

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00016307830810547

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016498565673828

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00015902519226074

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00015807151794434

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00033116340637207

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.0010669231414795

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00086307525634766

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00032591819763184

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.0001978874206543

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00021600723266602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00018715858459473

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00019001960754395

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00014805793762207

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00014901161193848

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00013899803161621

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00014209747314453

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00018405914306641

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00018405914306641

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021004676818848

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00020384788513184

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.0001838207244873

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00021886825561523

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00020217895507812

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018501281738281

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021910667419434

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.0001530647277832

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00019502639770508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00018119812011719

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018000602722168

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00013303756713867

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016188621520996

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00018310546875

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00020599365234375

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017905235290527

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017094612121582

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00016307830810547

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00016093254089355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.0001978874206543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019288063049316

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017499923706055

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00016999244689941

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00015497207641602

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00014901161193848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014686584472656

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014495849609375

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.0001518726348877

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00014591217041016

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00015497207641602

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014305114746094

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014400482177734

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00014019012451172

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00015115737915039

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00012588500976562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031304359436035

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026106834411621

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023818016052246

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023102760314941

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019192695617676

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00024700164794922

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.0001988410949707

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00019288063049316

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016307830810547

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.0001680850982666

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00016403198242188

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00015592575073242

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00013399124145508

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00013089179992676

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00016999244689941

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00018095970153809

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00016283988952637

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00015497207641602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00016307830810547

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00017499923706055

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00015902519226074

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00017499923706055

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00016593933105469

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00016093254089355

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00014901161193848

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00015807151794434

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00013589859008789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00012612342834473

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015711784362793

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.0001528263092041

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00011801719665527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00014805793762207

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00014996528625488

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014090538024902

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014400482177734

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00011801719665527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00017690658569336

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00014805793762207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014400482177734

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00013017654418945

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014209747314453

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00013208389282227

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00015091896057129

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00014400482177734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021815299987793

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00053191184997559

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00047516822814941

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00036215782165527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00029897689819336

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020694732666016

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020790100097656

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00018596649169922

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00019383430480957

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00019001960754395

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018906593322754

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020694732666016

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00023007392883301

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00020098686218262

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018095970153809

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00018405914306641

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00018620491027832

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00017809867858887

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00017690658569336

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015020370483398

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00037097930908203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029706954956055

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026702880859375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020694732666016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027012825012207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019717216491699

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025105476379395

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.0001988410949707

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017499923706055

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.0001680850982666

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017189979553223

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00016403198242188

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00015711784362793

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00015902519226074

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00014400482177734

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00017189979553223

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00018000602722168

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00016498565673828

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00017690658569336

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00015997886657715

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00016593933105469

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00014519691467285

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00038790702819824

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00048303604125977

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.001101016998291

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00038480758666992

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00025081634521484

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00022602081298828

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019717216491699

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00018811225891113

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020790100097656

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00020289421081543

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.0001828670501709

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00019478797912598

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00019693374633789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016188621520996

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016903877258301

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00019001960754395

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.0001990795135498

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.0001680850982666

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017595291137695

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00017499923706055

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015997886657715

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00016117095947266

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00015902519226074

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001530647277832

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014996528625488

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00015115737915039

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00015091896057129

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.0001518726348877

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014615058898926

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014805793762207

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00013303756713867

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00015115737915039

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00016403198242188

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014781951904297

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014305114746094

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00014495849609375

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.0001528263092041

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014185905456543

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014495849609375

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00011801719665527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00014710426330566

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014615058898926

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014305114746094

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00040698051452637

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024795532226562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020503997802734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024795532226562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019192695617676

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025415420532227

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.0002140998840332

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00014996528625488

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016689300537109

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00018000602722168

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.0001680850982666

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00013494491577148

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00015091896057129

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00016188621520996

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00021886825561523

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00021600723266602

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00020194053649902

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00019097328186035

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00017380714416504

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00018501281738281

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00014996528625488

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00017905235290527

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00014615058898926

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00015616416931152

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00036001205444336

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00034213066101074

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00023198127746582

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031900405883789

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00049114227294922

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00040602684020996

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00037097930908203

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00034999847412109

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.0011160373687744

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00032901763916016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020718574523926

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00022292137145996

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00019383430480957

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00020289421081543

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00020098686218262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016689300537109

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00019001960754395

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020718574523926

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00017905235290527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00019502639770508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.0001680850982666

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001680850982666

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012707710266113

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00015497207641602

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00017404556274414

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00016903877258301

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016188621520996

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020003318786621

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00021195411682129

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00017714500427246

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00020813941955566

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019001960754395

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00018692016601562

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00017285346984863

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00020599365234375

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00029802322387695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023984909057617

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00018119812011719

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00018787384033203

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00016498565673828

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00017690658569336

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001528263092041

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023198127746582

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00037693977355957

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026607513427734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002138614654541

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024199485778809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016999244689941

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00027298927307129

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00022602081298828

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017404556274414

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00019192695617676

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017213821411133

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00016593933105469

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00020813941955566

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00017809867858887

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00015687942504883

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.0001981258392334

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00020694732666016

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00017809867858887

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00018095970153809

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00013208389282227

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00020503997802734

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00017905235290527

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00015997886657715

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00015091896057129

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00016188621520996

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00013184547424316

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00014209747314453

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00013494491577148

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00012612342834473

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00010895729064941

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014185905456543

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00014114379882812

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00081396102905273

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.000762939453125

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00043296813964844

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023794174194336

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021195411682129

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00022196769714355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00023508071899414

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00021004676818848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020289421081543

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00017619132995605

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020384788513184

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00017595291137695

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00017404556274414

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.0001680850982666

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016403198242188

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016307830810547

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00012302398681641

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00018095970153809

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00017094612121582

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016093254089355

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015091896057129

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00014090538024902

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.0001518726348877

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00014591217041016

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015902519226074

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001680850982666

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00018000602722168

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00016403198242188

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00016593933105469

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00013494491577148

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015783309936523

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00016903877258301

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00015783309936523

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00013089179992676

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.00017499923706055

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00033998489379883

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003201961517334

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0017879009246826

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00041985511779785

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027298927307129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020313262939453

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00028800964355469

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00020503997802734

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017404556274414

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00017094612121582

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00014805793762207

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00018191337585449

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00020289421081543

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00015902519226074

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00015091896057129

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00018692016601562

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00019502639770508

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00017213821411133

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00018596649169922

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00014710426330566

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00016093254089355

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00014400482177734

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00015401840209961

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00014805793762207

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00013303756713867

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00014615058898926

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00015401840209961

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00018715858459473

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018787384033203

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00017213821411133

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017690658569336

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.0001680850982666

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00011801719665527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.0001671314239502

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00016212463378906

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015091896057129

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001518726348877

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00014591217041016

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00016093254089355

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00015616416931152

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00016403198242188

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00011110305786133

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015091896057129

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00014305114746094

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00015997886657715

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00015592575073242

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018596649169922

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00023508071899414

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00022602081298828

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00025415420532227

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00018191337585449

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015616416931152

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00013399124145508

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00017714500427246

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.0011990070343018

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00037884712219238

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024509429931641

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00021100044250488

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00020384788513184

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00018501281738281

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00018310546875

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017595291137695

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00018191337585449

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00015997886657715

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00018095970153809

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014400482177734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014996528625488

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.00018596649169922

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020408630371094

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00038290023803711

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003821849822998

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024700164794922

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026297569274902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019288063049316

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00030708312988281

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00023412704467773

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017595291137695

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016903877258301

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00017690658569336

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00014495849609375

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016307830810547

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00015997886657715

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00015902519226074

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00016999244689941

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.0001978874206543

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00016689300537109

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00017690658569336

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00018405914306641

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00017619132995605

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00018692016601562

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00018811225891113

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00016403198242188

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.0001680850982666

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00015902519226074

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00017404556274414

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00019311904907227

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023603439331055

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.0002601146697998

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00030899047851562

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00019407272338867

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00022482872009277

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00023102760314941

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.0003509521484375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022006034851074

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00019502639770508

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00017905235290527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00025296211242676

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00022578239440918

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020885467529297

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00018405914306641

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00018095970153809

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00019001960754395

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00017690658569336

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017595291137695

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00049901008605957

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00050210952758789

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00052595138549805

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00036311149597168

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00021886825561523

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00020503997802734

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00018501281738281

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.0001981258392334

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00021219253540039

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018787384033203

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00019097328186035

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00018405914306641

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00017905235290527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00018405914306641

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019192695617676

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017499923706055

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00016283988952637

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00017189979553223

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014901161193848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014400482177734

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.00015091896057129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020003318786621

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00038599967956543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026202201843262

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00022792816162109

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002439022064209

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001981258392334

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00025105476379395

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.00020813941955566

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00017714500427246

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.00016498565673828

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00050997734069824

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00092101097106934

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.0010349750518799

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00022411346435547

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00017976760864258

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00020694732666016

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00023603439331055

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00020480155944824

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00020003318786621

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00019311904907227

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00020289421081543

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00019097328186035

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00018215179443359

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.0001680850982666

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00017285346984863

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00016498565673828

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00017786026000977

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00017285346984863

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00012898445129395

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016403198242188

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00021696090698242

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00015902519226074

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00016188621520996

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.0001368522644043

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015401840209961

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015997886657715

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00014376640319824

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00015902519226074

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00015711784362793

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00015497207641602

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00013399124145508

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014901161193848

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00013589859008789

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00015783309936523

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.0001518726348877

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014996528625488

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014591217041016

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00014901161193848

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00015401840209961

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00016903877258301

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00012493133544922

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.0002140998840332

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00025200843811035

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00026082992553711

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002140998840332

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.0001680850982666

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00015401840209961

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00015997886657715

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00015902519226074

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014805793762207

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016999244689941

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00017094612121582

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00017905235290527

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00015401840209961

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014805793762207

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.00014400482177734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00042200088500977

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003349781036377

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025796890258789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024795532226562

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019693374633789

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017499923706055

SELECT *
FROM `plan`
WHERE 1 = 1 
 Execution Time:0.00085997581481934

SELECT `id`
FROM `users`
WHERE `id` > '3'  
 Execution Time:0.0010309219360352

SELECT `id`, `active_id`
FROM `users`
WHERE `id` = '3' and `active_status` = '1' 
 Execution Time:0.00034594535827637

SELECT `id`
FROM `users`
WHERE `active_status` = '1' and `active_id` > '1'  
 Execution Time:0.0002291202545166

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' and `active_status` = 1 
 Execution Time:0.00020718574523926

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('3') 
 Execution Time:0.00017094612121582

SELECT `id`
FROM `users`
WHERE `u_sponsor` IN('20', '21', '22', '23', '24', '25', '26', '27', '28', '29') 
 Execution Time:0.00016403198242188

SELECT `id`
FROM `users`
WHERE `active_status` = 1 
 Execution Time:0.00016593933105469

SELECT `id`
FROM `users`
WHERE `u_sponsor` = '3' 
 Execution Time:0.00016403198242188

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'total_directs' 
 Execution Time:0.00019407272338867

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'total_directs'
AND `u_code` = '3' 
 Execution Time:0.00018405914306641

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_directs' 
 Execution Time:0.00017404556274414

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_directs'
AND `u_code` = '3' 
 Execution Time:0.00017404556274414

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'my_gen' 
 Execution Time:0.00016093254089355

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'my_gen'
AND `u_code` = '3' 
 Execution Time:0.00018095970153809

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_gen' 
 Execution Time:0.00015997886657715

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_gen'
AND `u_code` = '3' 
 Execution Time:0.00017595291137695

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'single_leg_team' 
 Execution Time:0.00016593933105469

UPDATE `wallets` SET `value` = 10
WHERE `slug` = 'single_leg_team'
AND `u_code` = '3' 
 Execution Time:0.00018692016601562

SELECT `id`
FROM `wallets`
WHERE `u_code` = '3' and `slug` = 'active_single_leg' 
 Execution Time:0.00014185905456543

UPDATE `wallets` SET `value` = 1
WHERE `slug` = 'active_single_leg'
AND `u_code` = '3' 
 Execution Time:0.00017595291137695

SELECT `value`, `slug`
FROM `wallets`
WHERE `u_code` = '3' and `status` = '1' 
 Execution Time:0.00017189979553223

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014901161193848

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'wallet' and  `status` = '1' 
 Execution Time:0.00013113021850586

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00016212463378906

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00017809867858887

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00013399124145508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00014805793762207

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00014519691467285

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014400482177734

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'fund_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014400482177734

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'fund_wallet'
AND `status` = 1 
 Execution Time:0.00013303756713867

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.00014805793762207

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'fund_wallet' 
 Execution Time:0.0001990795135498

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017404556274414

SELECT `slug`, `name`
FROM `wallet_types`
WHERE `wallet_type` = 'income' and  `status` = '1' 
 Execution Time:0.00016903877258301

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'direct' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00015783309936523

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'direct'
AND `status` = 1 
 Execution Time:0.00014305114746094

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'direct' 
 Execution Time:0.00015592575073242

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'direct' 
 Execution Time:0.00016689300537109

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014615058898926

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'level' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00017690658569336

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'level'
AND `status` = 1 
 Execution Time:0.00012707710266113

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'level' 
 Execution Time:0.00014591217041016

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'level' 
 Execution Time:0.00014710426330566

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014090538024902

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'residual' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014591217041016

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'residual'
AND `status` = 1 
 Execution Time:0.00013208389282227

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'residual' 
 Execution Time:0.00015115737915039

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'residual' 
 Execution Time:0.00014305114746094

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00014710426330566

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'reward' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014090538024902

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'reward'
AND `status` = 1 
 Execution Time:0.00013899803161621

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'reward' 
 Execution Time:0.00014305114746094

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'reward' 
 Execution Time:0.00016498565673828

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00012397766113281

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'roi' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00014185905456543

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'roi'
AND `status` = 1 
 Execution Time:0.00013399124145508

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'roi' 
 Execution Time:0.00014686584472656

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'roi' 
 Execution Time:0.00014400482177734

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00012493133544922

SELECT `u_code`
FROM `rank`
WHERE `rank_id` = '0' and `u_code` = '3' and `rank` = 'pool-1' 
 Execution Time:0.00014615058898926

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00082993507385254

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00041890144348145

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026512145996094

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020194053649902

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023102760314941

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' 
 Execution Time:0.00024104118347168

SELECT COUNT(id) as total
FROM `users`
WHERE 1 = 1 
 Execution Time:0.00012898445129395

SELECT COUNT(id) as active
FROM `users`
WHERE `active_status` = '1' and DATE(active_date) = DATE('2020-04-30') 
 Execution Time:0.00021815299987793

SELECT COUNT(id) as total
FROM `users`
WHERE DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00017094612121582

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' 
 Execution Time:0.0001978874206543

SELECT COUNT(id) as total
FROM `epins`
WHERE `created_by` = 'admin' and DATE(added_on) = DATE('2020-04-30') 
 Execution Time:0.00016117095947266

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024294853210449

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00032496452331543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00066709518432617

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00094223022460938

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00066590309143066

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029110908508301

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020718574523926

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019192695617676

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00024294853210449

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00027585029602051

SELECT *
FROM `wallet_types`
WHERE `count_in_wallet` = 'main_wallet' and `status` = '1' and `wallet_type` = 'income' 
 Execution Time:0.00022792816162109

SELECT sum(amount) as total
FROM `transaction`
WHERE `wallet_type` = 'main_wallet'
AND `u_code` = '3'
AND `source` IN('direct', 'level', 'residual', 'reward', 'roi')
AND `status` = 1 
 Execution Time:0.00022101402282715

SELECT sum(amount) as total
FROM `transaction`
WHERE `u_code` = '3'
AND `source` = 'main_wallet'
AND `status` = 1 
 Execution Time:0.00018310546875

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'credit'
AND `tx_type` IN('admin_credit', 'transfer', 'added_btc')
AND `status` = 1
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00020194053649902

SELECT SUM(amount) as total, SUM(tx_charge) as charges
FROM `transaction`
WHERE `u_code` = '3'
AND `debit_credit` = 'debit'
AND `tx_type` IN('transfer', 'withdrawal', 'pin_purchase', 'topup')
AND `status` IN(1, 0)
AND `wallet_type` = 'main_wallet' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023698806762695

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00034999847412109

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027108192443848

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001978874206543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019001960754395

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023698806762695

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00030303001403809

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025606155395508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00034308433532715

SELECT `id`, `name`
FROM `users`
WHERE `username` = 'demo' 
 Execution Time:0.0002598762512207

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003509521484375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031185150146484

SELECT `id`, `name`
FROM `users`
WHERE `username` = 'demo' 
 Execution Time:0.00028300285339355

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00049400329589844

SELECT `id`, `name`
FROM `users`
WHERE `username` = 'demod' 
 Execution Time:0.00027298927307129

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00028395652770996

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00028800964355469

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00017404556274414

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0001981258392334

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.000244140625

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00075101852416992

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00031304359436035

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003199577331543

SELECT `id`, `name`
FROM `users`
WHERE `username` = 'demo' 
 Execution Time:0.00024294853210449

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00030994415283203

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00027179718017578

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00020289421081543

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018620491027832

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0002741813659668

SELECT `value`, `label`
FROM `advanced_info`
WHERE `status` = '1' 
 Execution Time:0.00028204917907715

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00026917457580566

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00035190582275391

SELECT *
FROM `transaction`
ORDER BY `id` ASC
 LIMIT 10 
 Execution Time:0.0003509521484375

SELECT COUNT(*) AS `numrows`
FROM `transaction` 
 Execution Time:0.00017094612121582

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003812313079834

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00047683715820312

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0012340545654297

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029182434082031

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.0002598762512207

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021696090698242

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00019001960754395

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021100044250488

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021505355834961

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00026202201843262

SELECT *
FROM `users`
WHERE `id` = '1' 
 Execution Time:0.00019001960754395

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00018596649169922

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00018405914306641

SELECT *
FROM `users`
WHERE `id` = '21' 
 Execution Time:0.00018000602722168

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00023889541625977

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0003211498260498

SELECT *
FROM `transaction`
ORDER BY `id` ASC
 LIMIT 10, 10 
 Execution Time:0.00032901763916016

SELECT COUNT(*) AS `numrows`
FROM `transaction` 
 Execution Time:0.0001518726348877

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00019502639770508

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00018906593322754

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00029993057250977

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.0009760856628418

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00029706954956055

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00021004676818848

SELECT *
FROM `users`
WHERE `id` = '3' 
 Execution Time:0.00020599365234375

SELECT `value`, `label`
FROM `company_info`
WHERE `status` = '1' 
 Execution Time:0.00025582313537598

