var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// historico_vt table
historico_vt_addTip=["",spacer+"This option allows all members of the group to add records to the 'HISTORICO VISITAS TECNICAS' table. A member who adds a record to the table becomes the 'owner' of that record."];

historico_vt_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'HISTORICO VISITAS TECNICAS' table."];

historico_vt_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'HISTORICO VISITAS TECNICAS' table, regardless of their owner."];

historico_vt_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'HISTORICO VISITAS TECNICAS' table."];
historico_vt_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'HISTORICO VISITAS TECNICAS' table."];

// tipo_documento table
tipo_documento_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tipo identificacion' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipo_documento_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tipo identificacion' table."];
tipo_documento_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tipo identificacion' table."];
tipo_documento_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tipo identificacion' table."];
tipo_documento_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tipo identificacion' table."];

tipo_documento_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tipo identificacion' table."];
tipo_documento_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tipo identificacion' table."];
tipo_documento_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tipo identificacion' table."];
tipo_documento_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tipo identificacion' table, regardless of their owner."];

tipo_documento_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tipo identificacion' table."];
tipo_documento_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tipo identificacion' table."];
tipo_documento_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tipo identificacion' table."];
tipo_documento_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tipo identificacion' table."];

// motivo_visita table
motivo_visita_addTip=["",spacer+"This option allows all members of the group to add records to the 'Motivo visita' table. A member who adds a record to the table becomes the 'owner' of that record."];

motivo_visita_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Motivo visita' table."];
motivo_visita_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Motivo visita' table."];
motivo_visita_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Motivo visita' table."];
motivo_visita_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Motivo visita' table."];

motivo_visita_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Motivo visita' table."];
motivo_visita_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Motivo visita' table."];
motivo_visita_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Motivo visita' table."];
motivo_visita_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Motivo visita' table, regardless of their owner."];

motivo_visita_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Motivo visita' table."];
motivo_visita_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Motivo visita' table."];
motivo_visita_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Motivo visita' table."];
motivo_visita_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Motivo visita' table."];

// barrios table
barrios_addTip=["",spacer+"This option allows all members of the group to add records to the 'Barrios' table. A member who adds a record to the table becomes the 'owner' of that record."];

barrios_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Barrios' table."];
barrios_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Barrios' table."];
barrios_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Barrios' table."];
barrios_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Barrios' table."];

barrios_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Barrios' table."];
barrios_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Barrios' table."];
barrios_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Barrios' table."];
barrios_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Barrios' table, regardless of their owner."];

barrios_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Barrios' table."];
barrios_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Barrios' table."];
barrios_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Barrios' table."];
barrios_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Barrios' table."];

// comunas table
comunas_addTip=["",spacer+"This option allows all members of the group to add records to the 'Comunas' table. A member who adds a record to the table becomes the 'owner' of that record."];

comunas_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Comunas' table."];
comunas_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Comunas' table."];
comunas_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Comunas' table."];
comunas_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Comunas' table."];

comunas_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Comunas' table."];
comunas_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Comunas' table."];
comunas_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Comunas' table."];
comunas_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Comunas' table, regardless of their owner."];

comunas_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Comunas' table."];
comunas_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Comunas' table."];
comunas_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Comunas' table."];
comunas_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Comunas' table."];

// fenomenos table
fenomenos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Fenomenos' table. A member who adds a record to the table becomes the 'owner' of that record."];

fenomenos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Fenomenos' table."];
fenomenos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Fenomenos' table."];
fenomenos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Fenomenos' table."];
fenomenos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Fenomenos' table."];

fenomenos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Fenomenos' table."];
fenomenos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Fenomenos' table."];
fenomenos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Fenomenos' table."];
fenomenos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Fenomenos' table, regardless of their owner."];

fenomenos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Fenomenos' table."];
fenomenos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Fenomenos' table."];
fenomenos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Fenomenos' table."];
fenomenos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Fenomenos' table."];

// caracteristicas_evento table
caracteristicas_evento_addTip=["",spacer+"This option allows all members of the group to add records to the 'Caracteristicas evento' table. A member who adds a record to the table becomes the 'owner' of that record."];

caracteristicas_evento_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Caracteristicas evento' table."];
caracteristicas_evento_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Caracteristicas evento' table."];
caracteristicas_evento_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Caracteristicas evento' table."];
caracteristicas_evento_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Caracteristicas evento' table."];

caracteristicas_evento_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Caracteristicas evento' table."];
caracteristicas_evento_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Caracteristicas evento' table."];
caracteristicas_evento_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Caracteristicas evento' table."];
caracteristicas_evento_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Caracteristicas evento' table, regardless of their owner."];

caracteristicas_evento_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Caracteristicas evento' table."];
caracteristicas_evento_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Caracteristicas evento' table."];
caracteristicas_evento_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Caracteristicas evento' table."];
caracteristicas_evento_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Caracteristicas evento' table."];

// tipo_material table
tipo_material_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tipo material' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipo_material_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tipo material' table."];
tipo_material_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tipo material' table."];
tipo_material_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tipo material' table."];
tipo_material_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tipo material' table."];

tipo_material_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tipo material' table."];
tipo_material_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tipo material' table."];
tipo_material_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tipo material' table."];
tipo_material_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tipo material' table, regardless of their owner."];

tipo_material_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tipo material' table."];
tipo_material_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tipo material' table."];
tipo_material_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tipo material' table."];
tipo_material_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tipo material' table."];

// lesiones table
lesiones_addTip=["",spacer+"This option allows all members of the group to add records to the 'Lesiones' table. A member who adds a record to the table becomes the 'owner' of that record."];

lesiones_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Lesiones' table."];
lesiones_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Lesiones' table."];
lesiones_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Lesiones' table."];
lesiones_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Lesiones' table."];

lesiones_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Lesiones' table."];
lesiones_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Lesiones' table."];
lesiones_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Lesiones' table."];
lesiones_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Lesiones' table, regardless of their owner."];

lesiones_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Lesiones' table."];
lesiones_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Lesiones' table."];
lesiones_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Lesiones' table."];
lesiones_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Lesiones' table."];

// capacidad_reducida table
capacidad_reducida_addTip=["",spacer+"This option allows all members of the group to add records to the 'capacidad reducida' table. A member who adds a record to the table becomes the 'owner' of that record."];

capacidad_reducida_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'capacidad reducida' table."];
capacidad_reducida_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'capacidad reducida' table."];
capacidad_reducida_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'capacidad reducida' table."];
capacidad_reducida_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'capacidad reducida' table."];

capacidad_reducida_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'capacidad reducida' table."];
capacidad_reducida_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'capacidad reducida' table."];
capacidad_reducida_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'capacidad reducida' table."];
capacidad_reducida_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'capacidad reducida' table, regardless of their owner."];

capacidad_reducida_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'capacidad reducida' table."];
capacidad_reducida_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'capacidad reducida' table."];
capacidad_reducida_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'capacidad reducida' table."];
capacidad_reducida_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'capacidad reducida' table."];

// servidor_publico table
servidor_publico_addTip=["",spacer+"This option allows all members of the group to add records to the 'Servidor publico' table. A member who adds a record to the table becomes the 'owner' of that record."];

servidor_publico_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Servidor publico' table."];
servidor_publico_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Servidor publico' table."];
servidor_publico_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Servidor publico' table."];
servidor_publico_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Servidor publico' table."];

servidor_publico_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Servidor publico' table."];
servidor_publico_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Servidor publico' table."];
servidor_publico_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Servidor publico' table."];
servidor_publico_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Servidor publico' table, regardless of their owner."];

servidor_publico_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Servidor publico' table."];
servidor_publico_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Servidor publico' table."];
servidor_publico_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Servidor publico' table."];
servidor_publico_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Servidor publico' table."];

// fuente_riesgo table
fuente_riesgo_addTip=["",spacer+"This option allows all members of the group to add records to the 'Fuentes de Riesgo' table. A member who adds a record to the table becomes the 'owner' of that record."];

fuente_riesgo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Fuentes de Riesgo' table."];
fuente_riesgo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Fuentes de Riesgo' table."];
fuente_riesgo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Fuentes de Riesgo' table."];
fuente_riesgo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Fuentes de Riesgo' table."];

fuente_riesgo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Fuentes de Riesgo' table."];
fuente_riesgo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Fuentes de Riesgo' table."];
fuente_riesgo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Fuentes de Riesgo' table."];
fuente_riesgo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Fuentes de Riesgo' table, regardless of their owner."];

fuente_riesgo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Fuentes de Riesgo' table."];
fuente_riesgo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Fuentes de Riesgo' table."];
fuente_riesgo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Fuentes de Riesgo' table."];
fuente_riesgo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Fuentes de Riesgo' table."];

// corregimientos table
corregimientos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Corregimientos' table. A member who adds a record to the table becomes the 'owner' of that record."];

corregimientos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Corregimientos' table."];
corregimientos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Corregimientos' table."];
corregimientos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Corregimientos' table."];
corregimientos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Corregimientos' table."];

corregimientos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Corregimientos' table."];
corregimientos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Corregimientos' table."];
corregimientos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Corregimientos' table."];
corregimientos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Corregimientos' table, regardless of their owner."];

corregimientos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Corregimientos' table."];
corregimientos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Corregimientos' table."];
corregimientos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Corregimientos' table."];
corregimientos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Corregimientos' table."];

// dependencias table
dependencias_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dependencias' table. A member who adds a record to the table becomes the 'owner' of that record."];

dependencias_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dependencias' table."];
dependencias_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dependencias' table."];
dependencias_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dependencias' table."];
dependencias_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dependencias' table."];

dependencias_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dependencias' table."];
dependencias_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dependencias' table."];
dependencias_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dependencias' table."];
dependencias_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dependencias' table, regardless of their owner."];

dependencias_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dependencias' table."];
dependencias_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dependencias' table."];
dependencias_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dependencias' table."];
dependencias_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dependencias' table."];

// solicitudes table
solicitudes_addTip=["",spacer+"This option allows all members of the group to add records to the 'Solicitudes' table. A member who adds a record to the table becomes the 'owner' of that record."];

solicitudes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Solicitudes' table."];
solicitudes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Solicitudes' table."];
solicitudes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Solicitudes' table."];
solicitudes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Solicitudes' table."];

solicitudes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Solicitudes' table."];
solicitudes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Solicitudes' table."];
solicitudes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Solicitudes' table."];
solicitudes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Solicitudes' table, regardless of their owner."];

solicitudes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Solicitudes' table."];
solicitudes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Solicitudes' table."];
solicitudes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Solicitudes' table."];
solicitudes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Solicitudes' table."];

// municipios table
municipios_addTip=["",spacer+"This option allows all members of the group to add records to the 'MUNICIPIOS' table. A member who adds a record to the table becomes the 'owner' of that record."];

municipios_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'MUNICIPIOS' table."];
municipios_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'MUNICIPIOS' table."];
municipios_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'MUNICIPIOS' table."];
municipios_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'MUNICIPIOS' table."];

municipios_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'MUNICIPIOS' table."];
municipios_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'MUNICIPIOS' table."];
municipios_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'MUNICIPIOS' table."];
municipios_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'MUNICIPIOS' table, regardless of their owner."];

municipios_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'MUNICIPIOS' table."];
municipios_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'MUNICIPIOS' table."];
municipios_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'MUNICIPIOS' table."];
municipios_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'MUNICIPIOS' table."];

// afectacion table
afectacion_addTip=["",spacer+"This option allows all members of the group to add records to the 'Afectacion' table. A member who adds a record to the table becomes the 'owner' of that record."];

afectacion_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Afectacion' table."];
afectacion_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Afectacion' table."];
afectacion_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Afectacion' table."];
afectacion_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Afectacion' table."];

afectacion_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Afectacion' table."];
afectacion_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Afectacion' table."];
afectacion_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Afectacion' table."];
afectacion_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Afectacion' table, regardless of their owner."];

afectacion_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Afectacion' table."];
afectacion_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Afectacion' table."];
afectacion_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Afectacion' table."];
afectacion_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Afectacion' table."];

// edificacion table
edificacion_addTip=["",spacer+"This option allows all members of the group to add records to the 'Edificacion' table. A member who adds a record to the table becomes the 'owner' of that record."];

edificacion_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Edificacion' table."];
edificacion_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Edificacion' table."];
edificacion_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Edificacion' table."];
edificacion_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Edificacion' table."];

edificacion_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Edificacion' table."];
edificacion_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Edificacion' table."];
edificacion_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Edificacion' table."];
edificacion_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Edificacion' table, regardless of their owner."];

edificacion_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Edificacion' table."];
edificacion_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Edificacion' table."];
edificacion_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Edificacion' table."];
edificacion_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Edificacion' table."];

// tipo_combustible table
tipo_combustible_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tipo combustible' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipo_combustible_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tipo combustible' table."];
tipo_combustible_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tipo combustible' table."];
tipo_combustible_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tipo combustible' table."];
tipo_combustible_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tipo combustible' table."];

tipo_combustible_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tipo combustible' table."];
tipo_combustible_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tipo combustible' table."];
tipo_combustible_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tipo combustible' table."];
tipo_combustible_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tipo combustible' table, regardless of their owner."];

tipo_combustible_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tipo combustible' table."];
tipo_combustible_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tipo combustible' table."];
tipo_combustible_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tipo combustible' table."];
tipo_combustible_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tipo combustible' table."];

// ubicacion table
ubicacion_addTip=["",spacer+"This option allows all members of the group to add records to the 'Ubicacion' table. A member who adds a record to the table becomes the 'owner' of that record."];

ubicacion_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Ubicacion' table."];
ubicacion_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Ubicacion' table."];
ubicacion_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Ubicacion' table."];
ubicacion_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Ubicacion' table."];

ubicacion_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Ubicacion' table."];
ubicacion_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Ubicacion' table."];
ubicacion_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Ubicacion' table."];
ubicacion_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Ubicacion' table, regardless of their owner."];

ubicacion_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Ubicacion' table."];
ubicacion_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Ubicacion' table."];
ubicacion_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Ubicacion' table."];
ubicacion_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Ubicacion' table."];

// tipo_evento table
tipo_evento_addTip=["",spacer+"This option allows all members of the group to add records to the 'TIPO DE EVENTO' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipo_evento_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'TIPO DE EVENTO' table."];
tipo_evento_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'TIPO DE EVENTO' table."];
tipo_evento_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'TIPO DE EVENTO' table."];
tipo_evento_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'TIPO DE EVENTO' table."];

tipo_evento_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'TIPO DE EVENTO' table."];
tipo_evento_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'TIPO DE EVENTO' table."];
tipo_evento_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'TIPO DE EVENTO' table."];
tipo_evento_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'TIPO DE EVENTO' table, regardless of their owner."];

tipo_evento_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'TIPO DE EVENTO' table."];
tipo_evento_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'TIPO DE EVENTO' table."];
tipo_evento_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'TIPO DE EVENTO' table."];
tipo_evento_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'TIPO DE EVENTO' table."];

// actividad_economica table
actividad_economica_addTip=["",spacer+"This option allows all members of the group to add records to the 'Actividad economica' table. A member who adds a record to the table becomes the 'owner' of that record."];

actividad_economica_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Actividad economica' table."];
actividad_economica_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Actividad economica' table."];
actividad_economica_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Actividad economica' table."];
actividad_economica_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Actividad economica' table."];

actividad_economica_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Actividad economica' table."];
actividad_economica_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Actividad economica' table."];
actividad_economica_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Actividad economica' table."];
actividad_economica_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Actividad economica' table, regardless of their owner."];

actividad_economica_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Actividad economica' table."];
actividad_economica_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Actividad economica' table."];
actividad_economica_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Actividad economica' table."];
actividad_economica_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Actividad economica' table."];

// usuarios table
usuarios_addTip=["",spacer+"This option allows all members of the group to add records to the 'Usuarios' table. A member who adds a record to the table becomes the 'owner' of that record."];

usuarios_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Usuarios' table."];
usuarios_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Usuarios' table."];
usuarios_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Usuarios' table."];
usuarios_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Usuarios' table."];

usuarios_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Usuarios' table."];
usuarios_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Usuarios' table."];
usuarios_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Usuarios' table."];
usuarios_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Usuarios' table, regardless of their owner."];

usuarios_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Usuarios' table."];
usuarios_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Usuarios' table."];
usuarios_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Usuarios' table."];
usuarios_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Usuarios' table."];

// procesos table
procesos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Procesos' table. A member who adds a record to the table becomes the 'owner' of that record."];

procesos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Procesos' table."];
procesos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Procesos' table."];
procesos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Procesos' table."];
procesos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Procesos' table."];

procesos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Procesos' table."];
procesos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Procesos' table."];
procesos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Procesos' table."];
procesos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Procesos' table, regardless of their owner."];

procesos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Procesos' table."];
procesos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Procesos' table."];
procesos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Procesos' table."];
procesos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Procesos' table."];

// tipo_riesgo table
tipo_riesgo_addTip=["",spacer+"This option allows all members of the group to add records to the 'TIPO DE RIESGO' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipo_riesgo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'TIPO DE RIESGO' table."];
tipo_riesgo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'TIPO DE RIESGO' table."];
tipo_riesgo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'TIPO DE RIESGO' table."];
tipo_riesgo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'TIPO DE RIESGO' table."];

tipo_riesgo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'TIPO DE RIESGO' table."];
tipo_riesgo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'TIPO DE RIESGO' table."];
tipo_riesgo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'TIPO DE RIESGO' table."];
tipo_riesgo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'TIPO DE RIESGO' table, regardless of their owner."];

tipo_riesgo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'TIPO DE RIESGO' table."];
tipo_riesgo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'TIPO DE RIESGO' table."];
tipo_riesgo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'TIPO DE RIESGO' table."];
tipo_riesgo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'TIPO DE RIESGO' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
