td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">The URL to redirect to after a user has logged out</td></tr>
<tr><td><a href="mod_auth_form.html#authformmethod">AuthFormMethod <var>fieldname</var></a></td><td></td><td>d</td><td>B</td></tr><tr><td class="descr" colspan="4">The name of a form field carrying the method of the request to attempt on successful login</td></tr>
<tr class="odd"><td><a href="mod_auth_form.html#authformmimetype">AuthFormMimetype <var>fieldname</var></a></td><td></td><td>d</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">The name of a form field carrying the mimetype of the body of the request to attempt on successful login</td></tr>
<tr><td><a href="mod_auth_form.html#authformpassword">AuthFormPassword <var>fieldname</var></a></td><td></td><td>d</td><td>B</td></tr><tr><td class="descr" colspan="4">The name of a form field carrying the login password</td></tr>
<tr class="odd"><td><a href="mod_auth_form.html#authformprovider">AuthFormProvider <var>provider-name</var>
[<var>provider-name</var>] ...</a></td><td> file </td><td>dh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Sets the authentication provider(s) for this location</td></tr>
<tr><td><a href="mod_auth_form.html#authformsitepassphrase">AuthFormSitePassphrase <var>secret</var></a></td><td></td><td>d</td><td>B</td></tr><tr><td class="descr" colspan="4">Bypass authentication checks for high traffic sites</td></tr>
<tr class="odd"><td><a href="mod_auth_form.html#authformsize">AuthFormSize <var>size</var></a></td><td></td><td>d</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">The largest size of the form in bytes that will be parsed for the login details</td></tr>
<tr><td><a href="mod_auth_form.html#authformusername">AuthFormUsername <var>fieldname</var></a></td><td></td><td>d</td><td>B</td></tr><tr><td class="descr" colspan="4">The name of a form field carrying the login username</td></tr>
<tr class="odd"><td><a href="mod_authz_groupfile.html#authgroupfile">AuthGroupFile <var>file-path</var></a></td><td></td><td>dh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">인증에 사용할 사용자 그룹 목록을 저장하는 문자파일명을
지정한다</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapauthorizeprefix">AuthLDAPAuthorizePrefix <em>prefix</em></a></td><td> AUTHORIZE_ </td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Specifies the prefix for environment variables set during
authorization</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapbindauthoritative">AuthLDAPBindAuthoritative off|on</a></td><td> on </td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Determines if other authentication providers are used when a user can be mapped to a DN but the server cannot successfully bind with the user's credentials.</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapbinddn">AuthLDAPBindDN <em>distinguished-name</em></a></td><td></td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Optional DN to use in binding to the LDAP server</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapbindpassword">AuthLDAPBindPassword <em>password</em></a></td><td></td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Password used in conjuction with the bind DN</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapcharsetconfig">AuthLDAPCharsetConfig <em>file-path</em></a></td><td></td><td>s</td><td>E</td></tr><tr><td class="descr" colspan="4">Language to charset conversion configuration file</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapcompareasuser">AuthLDAPCompareAsUser on|off</a></td><td> off </td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Use the authenticated user's credentials to perform authorization comparisons</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapcomparednonserver">AuthLDAPCompareDNOnServer on|off</a></td><td> on </td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Use the LDAP server to compare the DNs</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapdereferencealiases">AuthLDAPDereferenceAliases never|searching|finding|always</a></td><td> always </td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">When will the module de-reference aliases</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapgroupattribute">AuthLDAPGroupAttribute <em>attribute</em></a></td><td> member uniquemember +</td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">LDAP attributes used to identify the user members of
groups.</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapgroupattributeisdn">AuthLDAPGroupAttributeIsDN on|off</a></td><td> on </td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Use the DN of the client username when checking for
group membership</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapinitialbindasuser">AuthLDAPInitialBindAsUser off|on</a></td><td> off </td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Determines if the server does the initial DN lookup using the basic authentication users'
own username, instead of anonymously or with hard-coded credentials for the server</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapinitialbindpattern">AuthLDAPInitialBindPattern <em><var>regex</var> <var>substitution</var></em></a></td><td> (.*) $1 (remote use +</td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Specifies the transformation of the basic authentication username to be used when binding to the LDAP server
to perform a DN lookup</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapmaxsubgroupdepth">AuthLDAPMaxSubGroupDepth <var>Number</var></a></td><td> 10 </td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Specifies the maximum sub-group nesting depth that will be
evaluated before the user search is discontinued.</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapremoteuserattribute">AuthLDAPRemoteUserAttribute uid</a></td><td></td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Use the value of the attribute returned during the user
query to set the REMOTE_USER environment variable</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapremoteuserisdn">AuthLDAPRemoteUserIsDN on|off</a></td><td> off </td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Use the DN of the client username to set the REMOTE_USER
environment variable</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapsearchasuser">AuthLDAPSearchAsUser on|off</a></td><td> off </td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Use the authenticated user's credentials to perform authorization searches</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapsubgroupattribute">AuthLDAPSubGroupAttribute <em>attribute</em></a></td><td></td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">Specifies the attribute labels, one value per
directive line, used to distinguish the members of the current group that
are groups.</td></tr>
<tr class="odd"><td><a href="mod_authnz_ldap.html#authldapsubgroupclass">AuthLDAPSubGroupClass <em>LdapObjectClass</em></a></td><td> groupOfNames groupO +</td><td>dh</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Specifies which LDAP objectClass values identify directory
objects that are groups during sub-group processing.</td></tr>
<tr><td><a href="mod_authnz_ldap.html#authldapurl">AuthLDAPUrl <em>url [NONE|SSL|TLS|STARTTLS]</em></a></td><td></td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">URL specifying the LDAP search parameters</td></tr>
<tr class="odd"><td><a href="mod_authz_core.html#authmerging">AuthMerging Off | And | Or</a></td><td> Off </td><td>dh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Controls the manner in which each configuration section's
authorization logic is combined with that of preceding configuration
sections.</td></tr>
<tr><td><a href="mod_authn_core.html#authname">AuthName <var>auth-domain</var></a></td><td></td><td>dh</td><td>B</td></tr><tr><td class="descr" colspan="4">Authorization realm for use in HTTP
authentication</td></tr>
<tr class="odd"><td><a href="mod_authn_socache.html#authncachecontext">AuthnCacheContext <var>directory|server|custom-string</var></a></td><td></td><td>d</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Specify a context string for use in the cache key</td></tr>
<tr><td><a href="mod_authn_socache.html#authncacheenable">AuthnCacheEnable</a></td><td></td><td>s</td><td>B</td></tr><tr><td class="descr" colspan="4">Enable Authn caching configured anywhere</td></tr>
<tr class="odd"><td><a href="mod_authn_socache.html#authncacheprovidefor">AuthnCacheProvideFor <var>authn-provider</var> [...]</a></td><td></td><td>dh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Specify which authn provider(s) to cache for</td></tr>
<tr><td><a href="mod_authn_socache.html#authncachesocache">AuthnCacheSOCache <var>provider-name[:provider-args]</var></a></td><td></td><td>s</td><td>B</td></tr><tr><td class="descr" colspan="4">Select socache backend provider to use</td></tr>
<tr class="odd"><td><a href="mod_authn_socache.html#authncachetimeout">AuthnCacheTimeout <var>timeout</var> (seconds)</a></td><td></td><td>dh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Set a timeout for cache entries</td></tr>
<tr><td><a href="mod_authn_core.html#authnprovideralias">&lt;AuthnProviderAlias <var>baseProvider Alias</var>&gt;
... &lt;/AuthnProviderAlias&gt;</a></td><td></td><td>s</td><td>B</td></tr><tr><td class="descr" colspan="4">Enclose a group of directives that represent an
extension of a base authentication provider and referenced by
the specified alias</td></tr>
<tr class="odd"><td><a href="mod_authnz_fcgi.html#authnzfcgicheckauthnprovider">AuthnzFcgiCheckAuthnProvider <em>provider-name</em>|<code>None</code>
<em>option</em> ...</a></td><td></td><td>d</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Enables a FastCGI application to handle the check_authn
authentication hook.</td></tr>
<tr><td><a href="mod_authnz_fcgi.html#authnzfcgidefineprovider">AuthnzFcgiDefineProvider <em>type</em> <em>provider-name</em>
<em>backend-address</em></a></td><td></td><td>s</td><td>E</td></tr><tr><td class="descr" colspan="4">Defines a FastCGI application as a provider for
authentication and/or authorization</td></tr>
<tr class="odd"><td><a href="mod_authn_core.html#authtype">AuthType None|Basic|Digest|Form</a></td><td></td><td>dh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Type of user authentication</td></tr>
<tr><td><a href="mod_authn_file.html#authuserfile">AuthUserFile <var>file-path</var></a></td><td></td><td>dh</td><td>B</td></tr><tr><td class="descr" colspan="4">인증할 사용자명와 암호 목록을 저장하는 문자파일명을
지정한다</td></tr>
<tr class="odd"><td><a href="mod_authz_dbd.html#authzdbdlogintoreferer">AuthzDBDLoginToReferer On|Off</a></td><td> Off </td><td>d</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Determines whether to redirect the Client to the Referring
page on successful login or logout if a <code>Referer</code> request
header is present</td></tr>
<tr><td><a href="mod_authz_dbd.html#authzdbdquery">AuthzDBDQuery <var>query</var></a></td><td></td><td>d</td><td>E</td></tr><tr><td class="descr" colspan="4">Specify the SQL Query for the required operation</td></tr>
<tr class="odd"><td><a href="mod_authz_dbd.html#authzdbdredirectquery">AuthzDBDRedirectQuery <var>query</var></a></td><td></td><td>d</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Specify a query to look up a login page for the user</td></tr>
<tr><td><a href="mod_authz_dbm.html#authzdbmtype">AuthzDBMType default|SDBM|GDBM|NDBM|DB</a></td><td> default </td><td>dh</td><td>E</td></tr><tr><td class="descr" colspan="4">암호를 저장하는 데이터베이스 파일 종류를 지정한다</td></tr>
<tr class="odd"><td><a href="mod_authz_core.html#authzprovideralias">&lt;AuthzProviderAlias <var>baseProvider Alias Require-Parameters</var>&gt;
... &lt;/AuthzProviderAlias&gt;
</a></td><td></td><td>s</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Enclose a group of directives that represent an
extension of a base authorization provider and referenced by the specified
alias</td></tr>
<tr><td><a href="mod_authz_core.html#authzsendforbiddenonfailure">AuthzSendForbiddenOnFailure On|Off</a></td><td> Off </td><td>dh</td><td>B</td></tr><tr><td class="descr" colspan="4">Send '403 FORBIDDEN' instead of '401 UNAUTHORIZED' if
authentication succeeds but authorization fails
</td></tr>
<tr class="odd"><td><a href="mod_proxy.html#balancergrowth" id="B" name="B">BalancerGrowth <var>#</var></a></td><td> 5 </td><td>sv</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Number of additional Balancers that can be added Post-configuration</td></tr>
<tr><td><a href="mod_proxy.html#balancerinherit">BalancerInherit On|Off</a></td><td> On </td><td>sv</td><td>E</td></tr><tr><td class="descr" colspan="4">Inherit ProxyPassed Balancers/Workers from the main server</td></tr>
<tr class="odd"><td><a href="mod_proxy.html#balancermember">BalancerMember [<var>balancerurl</var>] <var>url</var> [<var>key=value [key=value ...]]</var></a></td><td></td><td>d</td><td>E</td></tr><tr class="odd"><td class="descr" colspan="4">Add a member to a load balancing group</td></tr>
<tr><td><a href="mod_proxy.html#balancerpersist">BalancerPersist On|Off</a></td><td> Off </td><td>sv</td><td>E</td></tr><tr><td class="descr" colspan="4">Attempt to persist changes made by the Balancer Manager across restarts.</td></tr>
<tr class="odd"><td><a href="mod_setenvif.html#browsermatch">BrowserMatch <em>regex [!]env-variable</em>[=<em>value</em>]
[[!]<em>env-variable</em>[=<em>value</em>]] ...</a></td><td></td><td>svdh</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">HTTP User-Agent에 따라 환경변수를 설정한다</td></tr>
<tr><td><a href="mod_setenvif.html#browsermatchnocase">BrowserMatchNoCase  <em>regex [!]env-variable</em>[=<em>value</em>]
    [[!]<em>env-variable</em>[=<em>value</em>]] ...</a></td><td></td><td>svdh</td><td>B</td></tr><tr><td class="descr" colspan="4">대소문자를 구별하지않고 User-Agent에 따라 환경변수를
설정한다</td></tr>
<tr class="odd"><td><a href="mod_log_config.html#bufferedlogs" /></td><td></td><td>s</td><td>B</td></tr><tr class="odd"><td class="descr" colspan="4">Buffer log entries in memory before writing to disk</td></tr>
<tr><td><a href="mod_buffer.html#buffersize">BufferSize integer</a></td><td> 131072 </td><td>svdh</td><td>E</td></tr><tr><td class="descr" colspan="4">Maximum size in bytes to buffer by the buffer filter</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cachedefaultexpire" id="C" name="C">CacheDefaultExpire <var>seconds</var></a></td><td> 3600 (one hour) </td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">만기시간을 지정하지않은 문서를 캐쉬할 기본 기간.</td></tr>
<tr><td><a href="mod_cache.html#cachedetailheader" /></td><td></td><td>svdh</td><td>X</td></tr><tr><td class="descr" colspan="4">Add an X-Cache-Detail header to the response.</td></tr>
<tr class="odd"><td><a href="mod_cache_disk.html#cachedirlength">CacheDirLength <var>length</var></a></td><td> 2 </td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">하위디렉토리명의 문자개수</td></tr>
<tr><td><a href="mod_cache_disk.html#cachedirlevels">CacheDirLevels <var>levels</var></a></td><td> 3 </td><td>sv</td><td>X</td></tr><tr><td class="descr" colspan="4">캐쉬의 하위디렉토리 깊이.</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cachedisable">CacheDisable <var> url-string</var></a></td><td></td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">특정 URL을 캐쉬하지 않는다</td></tr>
<tr><td><a href="mod_cache.html#cacheenable">CacheEnable <var>cache_type</var> <var>url-string</var></a></td><td></td><td>sv</td><td>X</td></tr><tr><td class="descr" colspan="4">지정한 저장관리자를 사용하여 지정한 URL을 캐쉬한다</td></tr>
<tr class="odd"><td><a href="mod_file_cache.html#cachefile">CacheFile <var>file-path</var> [<var>file-path</var>] ...</a></td><td></td><td>s</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">시작시 여러 파일 핸들을 캐쉬한다</td></tr>
<tr><td><a href="mod_cache.html#cacheheader" /></td><td></td><td>svdh</td><td>X</td></tr><tr><td class="descr" colspan="4">Add an X-Cache header to the response.</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cacheignorecachecontrol">CacheIgnoreCacheControl On|Off</a></td><td> Off </td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">클라이언트가 캐쉬하지않는 내용을 요청함을 무시한다.</td></tr>
<tr><td><a href="mod_cache.html#cacheignoreheaders">CacheIgnoreHeaders <var>header-string</var> [<var>header-string</var>] ...</a></td><td> None </td><td>sv</td><td>X</td></tr><tr><td class="descr" colspan="4">캐쉬에 지정한 HTTP 헤더(들)를 저장하지 않는다
</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cacheignorenolastmod">CacheIgnoreNoLastMod On|Off</a></td><td> Off </td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">응답에 Last Modified 헤더가 없다는 사실을 무시한다.</td></tr>
<tr><td><a href="mod_cache.html#cacheignorequerystring" /></td><td></td><td>sv</td><td>X</td></tr><tr><td class="descr" colspan="4">Ignore query string when caching</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cacheignoreurlsessionidentifiers" /></td><td></td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">Ignore defined session identifiers encoded in the URL when caching
</td></tr>
<tr><td><a href="mod_cache.html#cachekeybaseurl" /></td><td></td><td>sv</td><td>X</td></tr><tr><td class="descr" colspan="4">Override the base URL of reverse proxied cache keys.</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cachelastmodifiedfactor">CacheLastModifiedFactor <var>float</var></a></td><td> 0.1 </td><td>sv</td><td>X</td></tr><tr class="odd"><td class="descr" colspan="4">LastModified 시간으로 만기시간을 계산하는데 사용하는
계수.</td></tr>
<tr><td><a href="mod_cache.html#cachelock" /></td><td></td><td>sv</td><td>X</td></tr><tr><td class="descr" colspan="4">Enable the thundering herd lock.</td></tr>
<tr class="odd"><td><a href="mod_cache.html#cachelockmaxage" /></td><td></td><t