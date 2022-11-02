### CYKOR
# mysql에서 db만들기
데이터를 저장하기 위해서 database에 table을 만들어주었습니다.
```sql
create table board (
    number int not null auto_increment primary key,
    title varchar(150) not null,
    content text not null,
    username varchar(20) not null,
    id varchar(20) not null
);
```
게시판과 관련된 데이터를 저장하는 table입니다.

```sql
create table member (
    id varchar(20) not null,
    password varchar(20) not null,
    name varchar(20) not null
);
```
각 회원의 데이터를 저장하는 table입니다.

# 코드
- content.php
- delete.php
- login.php
- login_action.php
- logout_action.php
- read.php
- register.php
- register_action.php
- update.php
- update_action.php
- write.php
- wrtie_action.php

# 기능 정리
## 사용자 종류
- 비회원 : 로그인하지 않은 상태의 사용자로 게시판에 작성된 글을 읽을 수는 있지만 글을 쓰고 편집하는 작업은 불가능합니다.
- 회원 : 로그인한 상태로 게시판에 작성된 글을 읽을 수 있고, 자신이 작성한 글은 삭제하거나 수정할 수 있습니다.  

## 로그인 관련
- 로그인 : 회원가입한 회원의 경우 제대로 된 비밀번호와 id를 입력한 경우에 로그인이 되어 회원 권환을 가져올 수 있습니다. (비회원 상태일 때 content 창에 있습니다.)
- 로그아웃 : 회원 상태에서 비회원 상태가 됩니다. (회원 상태일 때 content 창에 있습니다.)
- 회원 가입: 기존에 다른 회원들과 다른 name, id를 입력하고 정상적으로 비밀번호를 입력하는 경우에 가능합니다. (login 창의 아래쪽에 register 버튼을 누르면 가능합니다.)

## 회원 권환
- 글쓰기 : content와 title을 입력해 게시판에 글을 등록할 수 있습니다.
- 수정 : 자신이 쓴 글의 title이나 content를 수정할 수 있습니다.
- 삭제 : 자신이 쓴 글을 게시판에서 삭제할 수 있습니다.

## 읽기
- 비회원, 회원 모두 content 창에서 글의 title을 누르면 작성자의 name과 그 글의 content를 볼 수 있습니다.
