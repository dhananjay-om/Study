<?php 
Simple join
SELECT * FROM `review_detail` rv INNER JOIN `om_review` om ON rv.review_id= om.review_id

Selected column  join
SELECT rv.review_id,rv.title,rv.detail,rv.nickname,om.helpful,om.report FROM `review_detail` rv INNER JOIN `om_review` om ON rv.review_id= om.review_id

With Where Condition
SELECT rv.review_id,rv.title,rv.detail,rv.nickname,om.helpful,om.report,om.om_review_id FROM `review_detail` rv INNER JOIN `om_review` om ON rv.review_id= om.review_id WHERE om.om_review_id=10

Order by
SELECT rv.review_id,rv.title,rv.detail,rv.nickname,om.helpful,om.report,om.om_review_id FROM `review_detail` rv INNER JOIN `om_review` om ON rv.review_id= om.review_id WHERE rv.review_id=10 ORDER BY om.om_review_id DESC

SELECT rv.review_id,rv.title,rv.detail,rv.nickname,om.helpful,om.report,om.om_review_id FROM `review_detail` rv JOIN `om_review` om ON rv.review_id= om.review_id WHERE rv.review_id=10 ORDER BY om.om_review_id DESC


Multiple joins
SELECT rv.review_id,vv.percent,rv.entity_pk_value,rvd.title,rvd.nickname,rvd.detail,vv.value FROM `review` rv INNER JOIN review_detail rvd ON rv.review_id= rvd.review_id INNER JOIN rating_option_vote vv ON rv.review_id = vv.review_id

If Condition
SELECT customer_firstname,customer_email,if(base_grand_total >= 200,"valid Order","Not Valid Order") AS Result FROM `sales_order`

CASE CONDITION
SELECT customer_firstname,increment_id,base_grand_total,
CASE
WHEN base_grand_total>= 400 AND base_grand_total <= 2000 THEN "Adavance Order"
WHEN base_grand_total>= 300 AND base_grand_total <400 THEN "Medium Order"
WHEN base_grand_total>= 200 AND base_grand_total <300 THEN "Low  Order"
ELSE "Not Correct Order"
END AS ORDER_TTITLE

 FROM `sales_order`

?>