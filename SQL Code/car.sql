CREATE TABLE car
(
    vin VARCHAR(20) NOT NULL,
    make VARCHAR(50),
    model VARCHAR(50),
    year INT,
    cust_id INT,
    FOREIGN KEY(cust_id) REFERENCES customer(cust_id),
    PRIMARY KEY(vin)
);