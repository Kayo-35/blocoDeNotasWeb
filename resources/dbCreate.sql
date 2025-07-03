CREATE TABLE usuario(
id_user INT NOT NULL AUTO_INCREMENT,
name VARCHAR(100) NOT NULL,
email VARCHAR(120) UNIQUE,

CONSTRAINT pk_usuario
    PRIMARY KEY(id_user)
);

CREATE TABLE notas (
id_nota INT NOT NULL AUTO_INCREMENT,
id_user INT NOT NULL,
body TEXT NOT NULL,
dt_nota DATE NOT NULL

CONSTRAINT pk_notas PRIMARY KEY (id_nota),
CONSTRAINT fk_usuario_notas
    FOREIGN KEY(id_user)
    REFERENCES usuario(id_user) );
