dnl $Id: config.m4,v 1.1.1.1 2001/04/03 06:03:46 danda Exp $
dnl config.m4 for extension xmlrpc
dnl don't forget to call PHP_EXTENSION(xmlrpc)

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

AC_DEFUN(XMLRPC_LIB_CHK,[
  str="$XMLRPC_DIR/$1/libxmlrpc.*"
  for j in `echo $str`; do
    if test -r $j; then
      XMLRPC_LIB_DIR="$XMLRPC_DIR/$1"
      break 2
    fi
  done
])

PHP_ARG_WITH(xmlrpc, for XMLRPC support,
[  --with-xmlrpc[=DIR]      Include XMLRPC support. DIR is the XMLRPC base
                          directory. If unspecified, the bundled XMLRPC library
                          will be used.], yes)

if test "$PHP_XMLRPC" != "no"; then
  AC_DEFINE(HAVE_XMLRPC, 1, [Whether you have XMLRPC])
  PHP_EXTENSION(xmlrpc,$ext_shared)
fi

if test "$PHP_XMLRPC" = "yes"; then
  XMLRPC_CHECKS
  XMLRPC_LIBADD=libxmlrpc/libxmlrpc_client.la
  XMLRPC_SHARED_LIBADD=libxmlrpc/libxmlrpc_client.la
  XMLRPC_SUBDIRS=libxmlrpc
  PHP_SUBST(XMLRPC_LIBADD)
  PHP_SUBST(XMLRPC_SUBDIRS)
  LIB_BUILD($ext_builddir/libxmlrpc,$ext_shared,yes)
  AC_ADD_INCLUDE($ext_srcdir/libxmlrpc)
  XMLRPC_MODULE_TYPE="builtin"
elif test "$PHP_XMLRPC" != "no"; then
  for i in $PHP_XMLRPC; do
    if test -r $i/include/xmlrpc/xmlrpc.h; then
      XMLRPC_DIR=$i
      XMLRPC_INC_DIR=$i/include/xmlrpc
    elif test -r $i/include/xmlrpc.h; then
      XMLRPC_DIR=$i
      XMLRPC_INC_DIR=$i/include
    fi
  done

  if test -z "$XMLRPC_DIR"; then
    AC_MSG_ERROR(Cannot find header files under $PHP_XMLRPC)
  fi

  XMLRPC_MODULE_TYPE="external"
  for i in lib lib/xmlrpc; do
    XMLRPC_LIB_CHK($i)
  done

  if test -z "$XMLRPC_LIB_DIR"; then
    AC_MSG_ERROR(Cannot find xmlrpcclient library under $XMLRPC_DIR)
  fi

  AC_ADD_LIBRARY_WITH_PATH(xmlrpc, $XMLRPC_LIB_DIR, XMLRPC_SHARED_LIBADD)

  AC_ADD_INCLUDE($XMLRPC_INC_DIR)
else
  XMLRPC_MODULE_TYPE="none"
fi
PHP_SUBST(XMLRPC_SHARED_LIBADD)


