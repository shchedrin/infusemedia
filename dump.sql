create table visitors
(
    id          int auto_increment
        primary key,
    ip_address  varchar(255) null,
    user_agent  varchar(255) null,
    view_date   datetime     not null,
    page_url    varchar(255) not null,
    views_count int(255)     not null
);

INSERT INTO app.visitors (id, ip_address, user_agent, view_date, page_url, views_count) VALUES (1, '172.24.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', '2023-03-28 19:48:00', 'http://localhost:46000/', 2);
INSERT INTO app.visitors (id, ip_address, user_agent, view_date, page_url, views_count) VALUES (2, '172.24.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', '2023-03-28 19:48:21', 'http://localhost:46000/index2.html', 5);
INSERT INTO app.visitors (id, ip_address, user_agent, view_date, page_url, views_count) VALUES (3, '172.24.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', '2023-03-28 19:48:07', 'http://localhost:46000/index1.html', 4);
