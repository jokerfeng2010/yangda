<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<%@ page language="java" import="java.util.*" pageEncoding="GBK"%>
<%@page import="java.sql.*,db.*" %>
<%
	int logType=0;
	request.setCharacterEncoding("GBK");
	ses.setSession(session);
	if (!ses.get("dxU2").equals(""))  logType = 2;
	if (!ses.get("dxU3").equals(""))  logType = 3;
	if (logType == 0){
		out.write("<script>alert('�𾴵Ĺ���Ա,����δ��¼,���¼��');window.location.href='/Login.html'</script>");	
		return;
	}
	session.setMaxInactiveInterval(7200);
%>

<%
	DBConn con = new DBConn();
	ResultSet rs;
	con.open();
%>
<%
	
	int total = Integer.parseInt(request.getParameter("total"));
	for (int num = 1; num <= total; num++){
		String q_id = request.getParameter(""+num);
		if (q_id != null)
			con.executeUpdate("delete from question where q_id= '" + q_id +"'");
	}
	
	response.setHeader("Refresh", "0;URL = SeaSelQue.jsp");
	out.write("<script>alert('ɾ���ɹ�');</script>");
%>
