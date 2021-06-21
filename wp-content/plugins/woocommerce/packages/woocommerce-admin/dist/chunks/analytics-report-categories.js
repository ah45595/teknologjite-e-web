(window.__wcAdmin_webpackJsonp=window.__wcAdmin_webpackJsonp||[]).push([[10],{612:function(e,t,r){"use strict";r.r(t);r(174),r(83),r(126),r(151),r(127),r(152);var o=r(4),c=r.n(o),n=r(13),a=r.n(n),i=r(14),s=r.n(i),l=r(16),u=r.n(l),m=r(17),d=r.n(m),b=r(7),p=r.n(b),g=r(0),y=(r(132),r(118),r(238),r(322),r(1)),f=r.n(y),_=r(2),O=r(15),v=r(101),h=r(629),j=Object(v.applyFilters)("woocommerce_admin_categories_report_charts",[{key:"items_sold",label:Object(_.__)("Items Sold",'woocommerce'),order:"desc",orderby:"items_sold",type:"number"},{key:"net_revenue",label:Object(_.__)("Net Sales",'woocommerce'),order:"desc",orderby:"net_revenue",type:"currency"},{key:"orders_count",label:Object(_.__)("Orders",'woocommerce'),order:"desc",orderby:"orders_count",type:"number"}]),w=Object(v.applyFilters)("woocommerce_admin_categories_report_filters",[{label:Object(_.__)("Show",'woocommerce'),staticParams:["chartType","paged","per_page"],param:"filter",showFilters:function(){return!0},filters:[{label:Object(_.__)("All Categories",'woocommerce'),value:"all"},{label:Object(_.__)("Single Category",'woocommerce'),value:"select_category",chartMode:"item-comparison",subFilters:[{component:"Search",value:"single_category",chartMode:"item-comparison",path:["select_category"],settings:{type:"categories",param:"categories",getLabels:h.a,labels:{placeholder:Object(_.__)("Type to search for a category",'woocommerce'),button:Object(_.__)("Single Category",'woocommerce')}}}]},{label:Object(_.__)("Comparison",'woocommerce'),value:"compare-categories",chartMode:"item-comparison",settings:{type:"categories",param:"categories",getLabels:h.a,labels:{helpText:Object(_.__)("Check at least two categories below to compare",'woocommerce'),placeholder:Object(_.__)("Search for categories to compare",'woocommerce'),title:Object(_.__)("Compare Categories",'woocommerce'),update:Object(_.__)("Compare",'woocommerce')}}}]}]),C=Object(v.applyFilters)("woocommerce_admin_category_report_advanced_filters",{}),S=r(10),k=r.n(S),R=(r(276),r(253),r(34)),q=r(3),E=r(28),P=r(112),F=r(278),N=r(33),x=r(647),A=r(638),B=r(627);function I(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,o=p()(e);if(t){var c=p()(this).constructor;r=Reflect.construct(o,arguments,c)}else r=o.apply(this,arguments);return d()(this,r)}}var V=function(e){u()(r,e);var t=I(r);function r(e){var o;return a()(this,r),(o=t.call(this,e)).getRowsContent=o.getRowsContent.bind(k()(o)),o.getSummary=o.getSummary.bind(k()(o)),o}return s()(r,[{key:"getHeadersContent",value:function(){return[{label:Object(_.__)("Category",'woocommerce'),key:"category",required:!0,isSortable:!0,isLeftAligned:!0},{label:Object(_.__)("Items Sold",'woocommerce'),key:"items_sold",required:!0,defaultSort:!0,isSortable:!0,isNumeric:!0},{label:Object(_.__)("Net Sales",'woocommerce'),key:"net_revenue",isSortable:!0,isNumeric:!0},{label:Object(_.__)("Products",'woocommerce'),key:"products_count",isSortable:!0,isNumeric:!0},{label:Object(_.__)("Orders",'woocommerce'),key:"orders_count",isSortable:!0,isNumeric:!0}]}},{key:"getRowsContent",value:function(e){var t=this,r=this.context,o=r.render,c=r.formatDecimal,n=(0,r.getCurrencyConfig)();return Object(q.map)(e,(function(e){var r=e.category_id,a=e.items_sold,i=e.net_revenue,s=e.products_count,l=e.orders_count,u=t.props,m=u.categories,d=u.query,b=m.get(r),p=Object(E.getPersistedQuery)(d);return[{display:Object(g.createElement)(x.a,{query:d,category:b,categories:m}),value:b&&b.name},{display:Object(F.formatValue)(n,"number",a),value:a},{display:o(i),value:c(i)},{display:b&&Object(g.createElement)(P.Link,{href:Object(E.getNewPath)(p,"/analytics/categories",{filter:"single_category",categories:b.id}),type:"wc-admin"},Object(F.formatValue)(n,"number",s)),value:s},{display:Object(F.formatValue)(n,"number",l),value:l}]}))}},{key:"getSummary",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,r=e.items_sold,o=void 0===r?0:r,c=e.net_revenue,n=void 0===c?0:c,a=e.orders_count,i=void 0===a?0:a,s=this.context,l=s.formatAmount,u=s.getCurrencyConfig,m=u();return[{label:Object(_._n)("category","categories",t,'woocommerce'),value:Object(F.formatValue)(m,"number",t)},{label:Object(_._n)("item sold","items sold",o,'woocommerce'),value:Object(F.formatValue)(m,"number",o)},{label:Object(_.__)("net sales",'woocommerce'),value:l(n)},{label:Object(_._n)("order","orders",i,'woocommerce'),value:Object(F.formatValue)(m,"number",i)}]}},{key:"render",value:function(){var e=this.props,t=e.advancedFilters,r=e.filters,o=e.isRequesting,c=e.query,n={helpText:Object(_.__)("Check at least two categories below to compare",'woocommerce'),placeholder:Object(_.__)("Search by category name",'woocommerce')};return Object(g.createElement)(A.a,{compareBy:"categories",endpoint:"categories",getHeadersContent:this.getHeadersContent,getRowsContent:this.getRowsContent,getSummary:this.getSummary,summaryFields:["items_sold","net_revenue","orders_count"],isRequesting:o,itemIdField:"category_id",query:c,searchBy:"categories",labels:n,tableQuery:{orderby:c.orderby||"items_sold",order:c.order||"desc",extended_info:!0},title:Object(_.__)("Categories",'woocommerce'),columnPrefsKey:"categories_report_columns",filters:r,advancedFilters:t})}}]),r}(g.Component);V.contextType=B.a;var L=Object(R.compose)(Object(O.withSelect)((function(e,t){var r=t.isRequesting,o=t.query;if(r||o.search&&(!o.categories||!o.categories.length))return{};var c=e(N.ITEMS_STORE_NAME),n=c.getItems,a=c.getItemsError,i=c.isResolving,s={per_page:-1};return{categories:n("categories",s),isError:Boolean(a("categories",s)),isRequesting:i("getItems",["categories",s])}})))(V),T=r(635),M=r(633),D=r(636),H=r(659),Q=r(637),K=r(184);function J(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function U(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,o=p()(e);if(t){var c=p()(this).constructor;r=Reflect.construct(o,arguments,c)}else r=o.apply(this,arguments);return d()(this,r)}}var z=function(e){u()(r,e);var t=U(r);function r(){return a()(this,r),t.apply(this,arguments)}return s()(r,[{key:"getChartMeta",value:function(){var e=this.props.query,t="compare-categories"===e.filter&&e.categories&&e.categories.split(",").length>1,r="single_category"===e.filter&&!!e.categories,o=t||r?"item-comparison":"time-comparison";return{isSingleCategoryView:r,itemsLabel:r?Object(_.__)("%d products",'woocommerce'):Object(_.__)("%d categories",'woocommerce'),mode:o}}},{key:"render",value:function(){var e=this.props,t=e.isRequesting,r=e.query,o=e.path,n=e.addCesSurveyForAnalytics,a=this.getChartMeta(),i=a.mode,s=a.itemsLabel,l=a.isSingleCategoryView,u=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?J(Object(r),!0).forEach((function(t){c()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):J(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},r);return"item-comparison"===i&&(u.segmentby=l?"product":"category"),w[0].filters.find((function(e){return"compare-categories"===e.value})).settings.onClick=n,Object(g.createElement)(g.Fragment,null,Object(g.createElement)(Q.a,{query:r,path:o,filters:w,advancedFilters:C,report:"categories"}),Object(g.createElement)(D.a,{charts:j,endpoint:"products",isRequesting:t,limitProperties:l?["products","categories"]:["categories"],query:u,selectedChart:Object(T.a)(r.chart,j),filters:w,advancedFilters:C,report:"categories"}),Object(g.createElement)(M.a,{charts:j,filters:w,advancedFilters:C,mode:i,endpoint:"products",limitProperties:l?["products","categories"]:["categories"],path:o,query:u,isRequesting:t,itemsLabel:s,selectedChart:Object(T.a)(r.chart,j)}),l?Object(g.createElement)(H.a,{isRequesting:t,query:u,baseSearchQuery:{filter:"single_category"},hideCompare:l,filters:w,advancedFilters:C}):Object(g.createElement)(L,{isRequesting:t,query:r,filters:w,advancedFilters:C}))}}]),r}(g.Component);z.propTypes={query:f.a.object.isRequired,path:f.a.string.isRequired};t.default=Object(O.withDispatch)((function(e){return{addCesSurveyForAnalytics:e(K.c).addCesSurveyForAnalytics}}))(z)},647:function(e,t,r){"use strict";r.d(t,"a",(function(){return O}));r(174);var o=r(13),c=r.n(o),n=r(14),a=r.n(n),i=r(16),s=r.n(i),l=r(17),u=r.n(l),m=r(7),d=r.n(m),b=r(0),p=(r(276),r(3)),g=r(5),y=r(112),f=r(28);function _(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,o=d()(e);if(t){var c=d()(this).constructor;r=Reflect.construct(o,arguments,c)}else r=o.apply(this,arguments);return u()(this,r)}}var O=function(e){s()(r,e);var t=_(r);function r(){return c()(this,r),t.apply(this,arguments)}return a()(r,[{key:"getCategoryAncestorIds",value:function(e,t){for(var r=[],o=e.parent;o;)r.unshift(o),o=t.get(o).parent;return r}},{key:"getCategoryAncestors",value:function(e,t){var r=this.getCategoryAncestorIds(e,t);if(r.length)return 1===r.length?t.get(Object(p.first)(r)).name+" › ":2===r.length?t.get(Object(p.first)(r)).name+" › "+t.get(Object(p.last)(r)).name+" › ":t.get(Object(p.first)(r)).name+" … "+t.get(Object(p.last)(r)).name+" › "}},{key:"render",value:function(){var e=this.props,t=e.categories,r=e.category,o=e.query,c=Object(f.getPersistedQuery)(o);return r?Object(b.createElement)("div",{className:"woocommerce-table__breadcrumbs"},this.getCategoryAncestors(r,t),Object(b.createElement)(y.Link,{href:Object(f.getNewPath)(c,"/analytics/categories",{filter:"single_category",categories:r.id}),type:"wc-admin"},r.name)):Object(b.createElement)(g.Spinner,null)}}]),r}(b.Component)},659:function(e,t,r){"use strict";r(174);var o=r(13),c=r.n(o),n=r(14),a=r.n(n),i=r(10),s=r.n(i),l=r(16),u=r.n(l),m=r(17),d=r.n(m),b=r(7),p=r.n(b),g=r(0),y=(r(132),r(276),r(117),r(277),r(118),r(253),r(2)),f=r(34),_=r(99),O=r(15),v=r(3),h=r(28),j=r(112),w=r(278),C=r(42),S=r(33),k=r(647),R=r(648),q=r(638),E=r(627);r(660);function P(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,o=p()(e);if(t){var c=p()(this).constructor;r=Reflect.construct(o,arguments,c)}else r=o.apply(this,arguments);return d()(this,r)}}var F=Object(C.g)("manageStock","no"),N=Object(C.g)("stockStatuses",{}),x=function(e){u()(r,e);var t=P(r);function r(){var e;return c()(this,r),(e=t.call(this)).getHeadersContent=e.getHeadersContent.bind(s()(e)),e.getRowsContent=e.getRowsContent.bind(s()(e)),e.getSummary=e.getSummary.bind(s()(e)),e}return a()(r,[{key:"getHeadersContent",value:function(){return[{label:Object(y.__)("Product Title",'woocommerce'),key:"product_name",required:!0,isLeftAligned:!0,isSortable:!0},{label:Object(y.__)("SKU",'woocommerce'),key:"sku",hiddenByDefault:!0,isSortable:!0},{label:Object(y.__)("Items Sold",'woocommerce'),key:"items_sold",required:!0,defaultSort:!0,isSortable:!0,isNumeric:!0},{label:Object(y.__)("Net Sales",'woocommerce'),screenReaderLabel:Object(y.__)("Net Sales",'woocommerce'),key:"net_revenue",required:!0,isSortable:!0,isNumeric:!0},{label:Object(y.__)("Orders",'woocommerce'),key:"orders_count",isSortable:!0,isNumeric:!0},{label:Object(y.__)("Category",'woocommerce'),key:"product_cat"},{label:Object(y.__)("Variations",'woocommerce'),key:"variations",isSortable:!0},"yes"===F?{label:Object(y.__)("Status",'woocommerce'),key:"stock_status"}:null,"yes"===F?{label:Object(y.__)("Stock",'woocommerce'),key:"stock",isNumeric:!0}:null].filter(Boolean)}},{key:"getRowsContent",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],r=this.props.query,o=Object(h.getPersistedQuery)(r),c=this.context,n=c.render,a=c.formatDecimal,i=c.getCurrencyConfig,s=i();return Object(v.map)(t,(function(t){var c=t.product_id,i=t.items_sold,l=t.net_revenue,u=t.orders_count,m=t.extended_info||{},d=m.category_ids,b=m.low_stock_amount,p=m.manage_stock,f=m.sku,O=m.stock_status,v=m.stock_quantity,S=m.variations,q=void 0===S?[]:S,E=Object(_.decodeEntities)(m.name),P=Object(h.getNewPath)(o,"/analytics/orders",{filter:"advanced",product_includes:c}),x=Object(h.getNewPath)(o,"/analytics/products",{filter:"single_product",products:c}),A=e.props.categories,B=d&&d.map((function(e){return A.get(e)})).filter(Boolean)||[],I=Object(R.a)(O,v,b)?Object(g.createElement)(j.Link,{href:Object(C.f)("post.php?action=edit&post="+c),type:"wp-admin"},Object(y._x)("Low","Indication of a low quantity",'woocommerce')):N[O];return[{display:Object(g.createElement)(j.Link,{href:x,type:"wc-admin"},E),value:E},{display:f,value:f},{display:Object(w.formatValue)(s,"number",i),value:i},{display:n(l),value:a(l)},{display:Object(g.createElement)(j.Link,{href:P,type:"wc-admin"},u),value:u},{display:Object(g.createElement)("div",{className:"woocommerce-table__product-categories"},B[0]&&Object(g.createElement)(k.a,{category:B[0],categories:A}),B.length>1&&Object(g.createElement)(j.Tag,{label:Object(y.sprintf)(Object(y._x)("+%d more","categories",'woocommerce'),B.length-1),popoverContents:B.map((function(e){return Object(g.createElement)(k.a,{category:e,categories:A,key:e.id,query:r})}))})),value:B.map((function(e){return e.name})).join(", ")},{display:Object(w.formatValue)(s,"number",q.length),value:q.length},"yes"===F?{display:p?I:Object(y.__)("N/A",'woocommerce'),value:p?N[O]:null}:null,"yes"===F?{display:p?Object(w.formatValue)(s,"number",v):Object(y.__)("N/A",'woocommerce'),value:v}:null].filter(Boolean)}))}},{key:"getSummary",value:function(e){var t=e.products_count,r=void 0===t?0:t,o=e.items_sold,c=void 0===o?0:o,n=e.net_revenue,a=void 0===n?0:n,i=e.orders_count,s=void 0===i?0:i,l=this.context,u=l.formatAmount,m=(0,l.getCurrencyConfig)();return[{label:Object(y._n)("product","products",r,'woocommerce'),value:Object(w.formatValue)(m,"number",r)},{label:Object(y._n)("item sold","items sold",c,'woocommerce'),value:Object(w.formatValue)(m,"number",c)},{label:Object(y.__)("net sales",'woocommerce'),value:u(a)},{label:Object(y._n)("orders","orders",s,'woocommerce'),value:Object(w.formatValue)(m,"number",s)}]}},{key:"render",value:function(){var e=this.props,t=e.advancedFilters,r=e.baseSearchQuery,o=e.filters,c=e.hideCompare,n=e.isRequesting,a=e.query,i={helpText:Object(y.__)("Check at least two products below to compare",'woocommerce'),placeholder:Object(y.__)("Search by product name or SKU",'woocommerce')};return Object(g.createElement)(q.a,{compareBy:c?void 0:"products",endpoint:"products",getHeadersContent:this.getHeadersContent,getRowsContent:this.getRowsContent,getSummary:this.getSummary,summaryFields:["products_count","items_sold","net_revenue","orders_count"],itemIdField:"product_id",isRequesting:n,labels:i,query:a,searchBy:"products",baseSearchQuery:r,tableQuery:{orderby:a.orderby||"items_sold",order:a.order||"desc",extended_info:!0,segmentby:a.segmentby},title:Object(y.__)("Products",'woocommerce'),columnPrefsKey:"products_report_columns",filters:o,advancedFilters:t})}}]),r}(g.Component);x.contextType=E.a,t.a=Object(f.compose)(Object(O.withSelect)((function(e,t){var r=t.query;if(t.isRequesting||r.search&&(!r.products||!r.products.length))return{};var o=e(S.ITEMS_STORE_NAME),c=o.getItems,n=o.getItemsError,a=o.isResolving,i={per_page:-1};return{categories:c("categories",i),isError:Boolean(n("categories",i)),isRequesting:a("getItems",["categories",i])}})))(x)},660:function(e,t,r){}}]);