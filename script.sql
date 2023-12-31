USE [9524colombia]
GO
/****** Object:  Table [dbo].[equipos]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[equipos](
	[id_equipo] [int] IDENTITY(1,1) NOT NULL,
	[usuario_id_usuario] [int] NOT NULL,
	[usuarios_id] [int] NOT NULL,
	[tipo_equipo_id_equipo] [int] NOT NULL,
	[nom_equipo] [varchar](45) NULL,
	[num_equipo] [varchar](20) NULL,
	[fecha_compra] [date] NULL,
	[fecha_inicio_garan] [date] NULL,
	[fecha_final_garan] [date] NULL,
	[imei1] [varchar](45) NULL,
	[imei2] [varchar](45) NULL,
	[estado_equipo] [varchar](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_equipo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Facturas]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Facturas](
	[id_factura] [int] IDENTITY(1,1) NOT NULL,
	[usuario_id_usuario] [int] NOT NULL,
	[num_factura] [varchar](20) NULL,
	[fecha_inicial] [datetime] NULL,
	[fecha_final] [datetime] NULL,
	[subtotal_factura] [varchar](20) NULL,
	[iva_factura] [varchar](20) NULL,
	[sub_total] [varchar](20) NULL,
	[total_factura] [varchar](20) NULL,
	[des_factura] [varchar](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_factura] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Pagos]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Pagos](
	[idPago] [int] IDENTITY(1,1) NOT NULL,
	[Facturas_id_factura] [int] NOT NULL,
	[fecha_pago] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[idPago] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tipo_equipo]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipo_equipo](
	[id_equipo] [int] IDENTITY(1,1) NOT NULL,
	[tipo_equipo] [varchar](45) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_equipo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tipo_usuario]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipo_usuario](
	[idtipo_usuario] [int] IDENTITY(1,1) NOT NULL,
	[tipo_usuario] [varchar](45) NULL,
PRIMARY KEY CLUSTERED 
(
	[idtipo_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[id_usuario] [int] IDENTITY(1,1) NOT NULL,
	[tipo_usuario_idtipo_usuario] [int] NOT NULL,
	[nom_usuario] [varchar](45) NULL,
	[tel_usuario] [varchar](45) NULL,
	[corr_usuario] [varchar](255) NULL,
	[dir_usuario] [varchar](255) NULL,
	[doc_usuario] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuarios]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuarios](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [varchar](45) NULL,
	[password_2] [varchar](45) NULL,
	[role] [varchar](45) NULL,
	[fehca_creacion] [timestamp] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[equipos]  WITH CHECK ADD FOREIGN KEY([tipo_equipo_id_equipo])
REFERENCES [dbo].[tipo_equipo] ([id_equipo])
GO
ALTER TABLE [dbo].[equipos]  WITH CHECK ADD FOREIGN KEY([usuarios_id])
REFERENCES [dbo].[usuarios] ([id])
GO
ALTER TABLE [dbo].[equipos]  WITH CHECK ADD FOREIGN KEY([usuario_id_usuario])
REFERENCES [dbo].[usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[Facturas]  WITH CHECK ADD FOREIGN KEY([usuario_id_usuario])
REFERENCES [dbo].[usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[Pagos]  WITH CHECK ADD FOREIGN KEY([Facturas_id_factura])
REFERENCES [dbo].[Facturas] ([id_factura])
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD FOREIGN KEY([tipo_usuario_idtipo_usuario])
REFERENCES [dbo].[tipo_usuario] ([idtipo_usuario])
GO
/****** Object:  StoredProcedure [dbo].[c_u9524]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[c_u9524]
    @username VARCHAR(255),
    @pasword VARCHAR(255),
    @role VARCHAR(255),
	 @fecha datetime
AS
BEGIN
    INSERT INTO Usuarios (username, password_2, role,fecha_creacion)
    VALUES (@username, @pasword, @role,@fecha);
END;
GO
/****** Object:  StoredProcedure [dbo].[crearEquipo]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[crearEquipo]
    @nombreEquipo NVARCHAR(255)
AS
BEGIN
    INSERT INTO tipo_equipo(tipo_equipo)
    VALUES (@nombreEquipo);
END;

GO
/****** Object:  StoredProcedure [dbo].[crearEquipos]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[crearEquipos]
   @tipo_usuario int,
    @usuario int,
    @tipoEquipo int,
    @nombreEquipo VARCHAR(30),
    @numeroEquipo VARCHAR(30),
    @fechaCompra DATETIME,
    @fechaInicio DATETIME,
    @fechaFinal DATETIME,
	 @imei1 VARCHAR(30),
	  @imei2 VARCHAR(30),
	   @estado_equipo VARCHAR(20)
AS
BEGIN
    -- Aquí puedes realizar la lógica necesaria para insertar los datos en la base de datos
    -- Por ejemplo, puedes realizar una inserción en una tabla específica.
    -- Reemplaza 'tu_tabla' con el nombre de la tabla real donde deseas insertar los datos.
    
    INSERT INTO equipos(usuario_id_usuario,usuarios_id, tipo_equipo_id_equipo, nom_equipo, num_equipo, fecha_compra, fecha_inicio_garan, fecha_final_garan,imei1,imei2,estado_equipo)
    VALUES (@tipo_usuario,@usuario, @tipoEquipo, @nombreEquipo, @numeroEquipo, @fechaCompra, @fechaInicio, @fechaFinal, @imei1, @imei2, @estado_equipo);
    
    -- Puedes realizar más operaciones aquí según tus necesidades

    -- Opcional: Si quieres retornar un mensaje de éxito, puedes usar SELECT
    SELECT 'Éxito: Datos insertados correctamente' AS Resultado;
END;
GO
/****** Object:  StoredProcedure [dbo].[crearTipoUsuario]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[crearTipoUsuario]
    @nombreUsuario NVARCHAR(255)
AS
BEGIN
    INSERT INTO tipo_usuario (tipo_usuario) VALUES (@nombreUsuario);
END;
GO
/****** Object:  StoredProcedure [dbo].[crearUsuario]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[crearUsuario]
    @Nombre VARCHAR(255),
    @Apellido VARCHAR(255),
    @Correo VARCHAR(255)
AS
BEGIN
    INSERT INTO Usuarios (username, password_2, role)
    VALUES (@Nombre, @Apellido, @Correo);
END;
GO
/****** Object:  StoredProcedure [dbo].[crearUsuarios]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[crearUsuarios]
     @tipo_usuario int,
    @nombre VARCHAR(45),
    @telefono VARCHAR(45),
    @correo VARCHAR(45),
    @direccion VARCHAR(45),
	@documento VARCHAR(45)
AS
BEGIN
    INSERT INTO usuario (tipo_usuario_idtipo_usuario, nom_usuario, tel_usuario, corr_usuario, dir_usuario,doc_usuario)
    VALUES (@tipo_usuario, @nombre, @telefono, @correo, @direccion,@documento);
END;
GO
/****** Object:  StoredProcedure [dbo].[IniciarSesion]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[IniciarSesion]
    @p_username NVARCHAR(255),
    @p_password NVARCHAR(255),
    @p_userRole NVARCHAR(20) OUTPUT
AS
BEGIN
    DECLARE @userCount INT;

    -- Verifica si el usuario existe y coincide con la contraseña
    SELECT @userCount = COUNT(*) FROM usuarios
    WHERE username = @p_username AND password_2 = @p_password;

    IF @userCount = 1
    BEGIN
        -- Obtiene el rol del usuario
        SELECT @p_userRole = role FROM usuarios WHERE username = @p_username;
    END
    ELSE
    BEGIN
        SET @p_userRole = 'No válido';
    END
END;
GO
/****** Object:  StoredProcedure [dbo].[ObtenerEquipos]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[ObtenerEquipos]
   @id_equipo INT,
   @usuario_id_usuario INT,
    @usuarios_id INT,
    @tipo_equipo_id_equipo INT,
    @nom_equipo VARCHAR(255),
    @num_equipo varchar(30),
    @fecha_compra DATETIME,
    @fecha_inicio_garan DATETIME,
    @fecha_final_garan DATETIME,
	@imei1 varchar(45),
	@imei2 varchar(45),
	@estado_equipo varchar(30)
AS
BEGIN
    SELECT
	    id_equipo,
		usuario_id_usuario,
        usuarios_id,
        tipo_equipo_id_equipo,
        nom_equipo,
        num_equipo,
        fecha_compra,
        fecha_inicio_garan,
        fecha_final_garan,
		imei1,
		imei2,
		estado_equipo
    FROM
        equipos
   
END;
GO
/****** Object:  StoredProcedure [dbo].[ObtenerTiposEquipo]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[ObtenerTiposEquipo]
AS
BEGIN
    SELECT id_equipo, tipo_equipo FROM tipo_equipo;
END;
GO
/****** Object:  StoredProcedure [dbo].[ObtenerTipoUsuario]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[ObtenerTipoUsuario]
AS
BEGIN
    SELECT id_usuario, nom_usuario FROM usuario;
END;
GO
/****** Object:  StoredProcedure [dbo].[ObtenerTipoUsuarios]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[ObtenerTipoUsuarios]
AS
BEGIN
    SELECT idtipo_usuario, tipo_usuario
    FROM tipo_usuario;
END;
GO
/****** Object:  StoredProcedure [dbo].[ObtenerUsuario]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[ObtenerUsuario]
    @id_usuario INT,
    @tipo_usuario_idtipo_usuario INT,
    @nom_usuario NVARCHAR(255),
    @corr_usuario NVARCHAR(255),
    @tel_usuario NVARCHAR(255),
    @dir_usuario NVARCHAR(255),
	 @doc_usuario NVARCHAR(255)
AS
BEGIN
    SELECT
        id_usuario,
        tipo_usuario_idtipo_usuario,
        nom_usuario,
        corr_usuario,
        tel_usuario,
        dir_usuario,
		doc_usuario
    FROM
        usuario
    
END;
GO
/****** Object:  StoredProcedure [dbo].[ObtenerUsuarios]    Script Date: 13/11/2023 22:12:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[ObtenerUsuarios]
AS
BEGIN
    SELECT id, username FROM usuarios;
END;
GO
