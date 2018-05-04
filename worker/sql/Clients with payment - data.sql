SELECT users.id, users.login, users.email, clients.order_key FROM users 
INNER JOIN clients ON clients.user_id = users.id 
WHERE users.role_id = 2 
AND users.status_id <> 8 
AND clients.order_key <> ''
AND users.status_id <> 4;