# #   Q F o r m 
 
 # # #   A b o u t 
 
 Q F o r m   i s   s i m p l e ,   O b j e c t - O r i e n t e d   P H P   l i b r a r y ,   f o r   m a k i n g   a n d   v a l i d a t i n g   f o r m s   e a s i e r . 
 I t ' s   c u r r e n t l y   i n   d e v e l o p m e n t   s t a t e   a n d   i t   s h o u l d   n o t   b e   u s e d   i n   p r o t u c t i o n   y e t   a n d   A P I   c a n   c h a n g e   p r e t t y   m u c h . 
 
 # # #   R e q u i r e m e n t s 
 
   -   P H P   5 . 3   o r   h i g h e r 
 
 # # #   L i c e n s e 
 
   T h e   p r o j e c t   i s   l i c e n s e d   u n d e r   M I T   L i c e n s e . 
 
 # # #   Q u i c k   E x a m p l e 
 
 M a k e   s u r e   b e f o r e   l a u n c h i n g   t h a t   c o d e   t o   u s e   s o m e   a u t o l o a d e r . 
 
 ` ` ` P H P 
 < ? p h p 
 #   C r e a t e   n e w   f o r m 
 $ f o r m   =   n e w   Q F o r m \ F o r m ( ' l o g i n ' ,   ' u s e r / l o g i n ' ) ; 
 
 #   A d d   T e x t b o x 
 $ f o r m - > a d d C h i l d (   n e w   Q F o r m \ C o n t r o l \ T e x t B o x ( ' l o g i n ' ) ) ; 
 
 #   C r e a t e   r e n d e r e r 
 $ r e n d e r e r   =   n e w   Q F o r m \ H t m l R e n d e r e r ( ) ; 
 e c h o   h t m l s p e c i a l c h a r s ( $ r e n d e r e r - > r e n d e r ( $ f o r m ) ) ; 
 ` ` ` 
 