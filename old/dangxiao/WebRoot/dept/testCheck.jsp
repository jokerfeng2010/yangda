<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<%@ page language="java" import="java.util.*" pageEncoding="GBK"%>
<%@page import="db.*,java.sql.*"%>
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
	con.open();try{
%>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
		<link href="Head.css" rel="stylesheet" type="text/css" />
        <link href="testCheck.css" rel="stylesheet" type="text/css" />
		<script language="javascript">
			function keyWord() {
				document.getElementById("keyw").value=""+ 1;
				Form.submit();
		
			}
		</script>
	</head>
	<body>
        <div id="outer">
		<!--                     ��ҳͷ��                   -->
		<div id="outer">
			<!--                     ��ҳͷ��                   -->
			<div class="titlepic">
				<p>
					��У���߿���ƽ̨
				</p>
			</div>
			<div class="menucontainer">
				<div class="menu">
					<ul>
						<li>
							<a>�û��趨</a>
							<table>
								<tr>
									<td>
										<ul>
											<li>
												<a href="AddAdmin.jsp">���ӹ���Ա</a>
											</li>
											<li>
												<a href="DelAdmin.jsp">ɾ������Ա</a>
											</li>
											<li>
												<a href="SeaAdmin.jsp">�鿴����Ա</a>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<a>ѧԱ����</a>
							<table>
								<tr>
									<td>
										<ul>
											<li>
												<a href="SeaStudent.jsp">���Է���</a>
											</li>
											<li>
												<a href="chgStudent.jsp">�鿴�޸�</a>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<a>����ά��</a>
							<table>
								<tr>
									<td>
										<ul>
											<li>
												<a href="AddSelQue.jsp">����ѡ����</a>
											</li>
											<li>
												<a href="SeaSelQue.jsp">��ѯѡ����</a>
											</li>
											<li>
												<a href="AddJudQue.jsp">�����ж���</a>
											</li>
											<li>
												<a href="SeaJudQue.jsp">��ѯ�ж���</a>
											</li>
											<li>
												<a href="AddAnsQue.jsp">���ӽ����</a>
											</li>
											<li>
												<a href="SeaAnsQue.jsp">�鿴�����</a>
											</li>
											<li>
												<a href="AddSeaMid.jsp">���������м��Ծ�</a>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<a>���Թ���</a>
							<table>
								<tr>
									<td>
										<ul>
											<li>
												<a href="SetTime.jsp">�����趨</a>
											</li>
											<li>
												<a href="SeaTestSet.jsp">���Բ鿴</a>
											</li>
											<li>
												<a href="testCheck.jsp">�Ծ�����</a>
											</li>
											<li>
												<a href="GetGoal.jsp">�ɼ�ͳ��</a>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</li>
						<li></li>
						<li>
							<a href="ChgPwd.jsp">�޸�����</a>
						</li>
						<li>
							<a href="deptChg.jsp">ѧԺ����</a>
						</li>
						<li>
							<a href="infoBroad.jsp">��Ϣ����</a>
						</li>
						<li>
							<a href="safeExit.jsp">��ȫ�˳�</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- ��ҳ���� -->
		</div>
        <br />
		<br />


           <div id="bod">
              <div id="bodin">           
			<form action="testCheck.jsp" method="post" name="Form">

				<span>Ժϵ:</span>
				<select tabindex='8' name="dept" id="dept">
					<%
						String queryS = "select * from department";
						if (logType == 2) queryS += " where dept_id ='" + ses.get("m_dept_id") + "'";
						rs = con.executeQuery(queryS);
						while (rs.next()) {
					%>
					<option value="<%=rs.getInt(1)%>">
						<%=rs.getString(2)%>
					</option>
					<%
					}
					%>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>�û���:</span>
				<input size='10' id="suser" name="suser" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</<span>����:</span>
				<input size='10' id="s_name" name="s_name" />
				<input type="submit" id="conf" value="�鿴" onclick="keyWord();" />
				<input type="hidden" id="keyw" name="keyw" value="0" />
			</form>
			<br />
			<br />

			<%
				request.setCharacterEncoding("GBK");
				String keyword = request.getParameter("keyw");
				if ("1".equals(keyword)) {
					String s_user, s_id, s_name, s_class, dept_id, dept_name;
					int score_ans;
					dept_id = request.getParameter("dept");
					s_user = request.getParameter("suser");
					s_name = request.getParameter("s_name");
					queryS = "select distinct s_id, s_name, s_class, student.s_user, dept_name, score_ans  from student, ansQue, department where student.dept_id=department.dept_id and student.s_user=ansQue.s_user";
					if (!(dept_id.equals("0")))
						queryS += " and student.dept_id='" + dept_id + "'";
					if (!(s_user.equals("")))
						queryS += " and student.s_user='" + s_user + "'";
					if (!(s_name.equals("")))
						queryS += " and s_name='" + s_name + "'";
					rs = con.executeQuery(queryS);
					int num = 0, score_type;
					String[] check = new String[4];
					for (int i = 0; i < 4; i++)
						check[i] = "";
			%>
			<form action="SeaStudent/confAll.jsp" method="post">
				<table border=1>
					<tr>
						<th width="68">
							����
						</th>
						<th width="88">
							ѧ��
						</th>
						<th width="125">
							�༶
						</th>
						<th width="180">
							Ժϵ
						</th>
						<th>
							�������
						</th>
						<th width="120">
							����������
						</th>
					</tr>
					<%
							while (rs.next()) {
								s_name = rs.getString("s_name");
								s_id = rs.getString("s_id");
								s_class = rs.getString("s_class");
								dept_name = rs.getString("dept_name");
								s_user = rs.getString("s_user");
								score_ans = rs.getInt("score_ans");
								num++;
					%>
					<tr>
						<td align="center">
							<%=s_name%>
						</td>
						<td align="center">
							<%=s_id%>
						</td>
						<td align="center">
							<%=s_class%>
						</td>
						<td align="center">
							<%=dept_name%>
						</td>
						<td align="center">
							<%
								if (score_ans == -1) out.print("δ����");
								else out.print("" + score_ans + "��");
							%>
						</td>
						<td align="center">
							<input type="button"id="conf2" value="����"onclick="window.open('testCheck/goTestCheck.jsp?s_user=<%=s_user%>', '');" />
							</form>
						</td>
					</tr>
			<%
					}
				}
				
			%>
			
				</table>
			</form>
		</div>
        </div>
        </div>
	</body>
</html>
<%
	}catch(Exception ex){
		ex.printStackTrace();
	}finally{
		con.close();
	}
%>