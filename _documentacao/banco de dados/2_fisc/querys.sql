SELECT
    p.data_protocolo,
    p.numero_protocolo,
    p.ano_protocolo,
    p.numero_oficio,
    p.ano_oficio,
    p.numero_memorando,
    p.ano_memorando,
    tp.tipo_protocolo,
    td.documento,
    o.origem,
    d.*,
    tds.tipo_denuncia,
    c.cidade,
    b.bairro
FROM
    cofisc_protocolo AS p
INNER JOIN cofisc_tipo_protocolo AS tp
INNER JOIN cofisc_tipo_documento AS td
INNER JOIN cofisc_origem AS o
INNER JOIN cofisc_denuncia AS d
INNER JOIN cofisc_tipo_denuncia AS tds
INNER JOIN cidade AS c
INNER JOIN bairro AS b
WHERE
    p.protocolo_id = tp.id
    AND p.tipo_documento_id = td.id
    AND p.origem_id = o.id
    AND d.protocolo_id = p.id
    AND d.tipo_denuncia_id = tds.id
    AND d.cidade_id = c.id
    AND d.bairro_id = b.id;
    