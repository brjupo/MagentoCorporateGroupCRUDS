Contact me:
Brandon Juárez Ponce
Magento Developer
https://www.linkedin.com/in/brjupo/ 
https://github.com/brjupo/

The module vendor_name is Brjupo_CorporateGroup

Instructions:
1.- Create corporate group entity, it should had the following
- entity_id
- corporate group identifier
- corporate group contact email
- corporate group contact telephone

2.- Customer can belong to one corporate group
- link customer to corporate group

3.- Create and expose a web api to allow fetch, create, delete & search corporate groups




Solution:
1.- Please refer to app/code/Brjupo/CorporateGroup/etc/db_schema.xml

2.- Please refer to app/code/Brjupo/CorporateGroup/etc/db_schema.xml. To solve this, I add the "corp_group_id" column in "customer_entity" table, and add an index and a constraint

3.-You can see webapi endpoints in file: app/code/Brjupo/CorporateGroup/etc/webapi.xml




Youtube links showing the "magic" [videos only available with links]
https://youtu.be/Ert5xV-GoLU
https://youtu.be/Y_f7cTBjp5w

This module looks like "Customer Group" files. Yep, thats correct, I take this files as reference.
 

In this ZIP you can find:
i) The module "Brjupo_CorporateGroup"
ii) Postman collection
iii) Youtube links [here in README.txt]
iv) README.txt file


PD: This is a basic and simplest solution to the exercise, I know that this can be improve as merchant or bussiness requirements.
