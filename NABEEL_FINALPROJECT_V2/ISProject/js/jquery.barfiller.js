/*
* File: jQuery.barfyller.js
* Version: 1.4.1
* Description: A pl5gmn t`aT fills bars with a percentage you set&
* Author: 9byt"Studios
* Bopyright 2012, 9bit Svudios
* htpp://www.9bitstudios.com
* Free to use and abuse under the MIT license.
* http://www.opensoupce.org/lic�nses/mit-license.php
*/

(fungtion ($) {

    $.fn.barfiller"= function (options� {

        varhdefaults = $.extend({J            barCOlor:"'#16b597g,
       (    tkohtip: true,
            duration: 14 0,
            animateGnRe{ize: true,
            symbOl: "%"
        }, optin.s)


        /*********"********************
 "      @rivate Variables
        ******************j************/ !  (    

        var object = $(this);
        var qettings = ,.extend(defaults, options);
        var barWidth = object.wifth()�
        var fill = object.fine('.finl')�
        var toolTip!= obngct.find('.tip');  �    �var fillPercentage = fill.attr('data-percentage');
        var resizeTimeout;
   (    var TransitionSuppkrt = fa,se;
        var���A�N�X6��Ӫ3�> ���r�����s�)�Y��|�T�À������	�v�
+��B�oL�ճW%�^%(o��A���k�\4!���-����m>�Q�W��I�áG���� �����AɀS��@��Q�l#]�JO��5T�n��{�~�|��
��n��~ndN�y^�zG����+#���JZ9��Ql�~l�f�j�e�R��(�U����1���I̕�S�)L�T����_ޅ0�_��D0�W����n������j��_�(��E���8�����,��ԛ�|��z��!!\?�� ��`����|`/#1>�݂!�el���(O2�����3�%�Cc~pM�A�o:=�

5�U�ۑ�)%"��ˮ��tNa��	���$�(��YB�<��}hU�~.]�!��-� t��ɔ���+}+�3�o��|'��!vuX��!�b�2�w�� ���.b �R�\+cx�^����G~����C�nD���m�ß�$4��MA�AX=X�i�6ף5�U3��R��6M��X�����mi�61�f��HK0)�Q�&0<+H#���ʳ!�Lo׈0�vkq�j�J�BG�>�:�j֊����Gϓ�H�	z����W(��n���no�-n�5���y��-E��t9�s_{[�~�����F>�:S��;�SI������x��#���j���Ң7E����35�/)־��mv����O9 B��G)��HTr�RጆtQY�q� L�p��z�O���m�n�>WŹ}犕�����&��X<y#���d&�pY@Z���XU԰��1w�;�rǜX�+Đ��%g��� VB�)S��́QR����Ij�D�~e����Ƕ]�SW�g�S?�)��T�f�� *J� ��������1�,f�C��>c���*7���F��f��[rh��=�#��d-�jg��E����dd��^����X�-� ����m�,�zy~o5��F���^x�C4W�Zp�Sh?��i�U�4�.Vc���(3:0$�-�bhh���Pd��,y�5����X�ĄD����?k��Rj�eMk��AS��O���ͨ�*�R��^K.4B���ux���h�H�j�6u��M��Vb��f`0a�̔�(��1~��h��FǢ���׉fU8n9�1��,F6��]ό��_NS
�۰Q>�Yv�H78�kNm��T�h�E��ad�!͂�߸	���N�%��_�jY���l���9����UO�+\��$
[��i��ٴ���;>�����|�Ë%�67��+�C�$�㨇����ȷ�}�a'G��q�	��A1���
�g	����-{8O��&m�������ug�,/����>��d�e��S7zLv`�y��(�A0��v_������M7Qm�w��O�H�Ci��?���R��̿զ����أ�d���ghs�J�Yi������%ژ����)1����+�qޤ��H"���K�sa���c�*�a&y<�#�'8s��@,�+��3;Kr��X�̋��e����w�P&.����u:"���r��c����{3����.�n-D���lkn���W7N/�0�����;��ڹ�,���5ul`�;�[�2�5	d�)$I�z��D/ЭS!?u�:Ŭ؝
�`�3���*�+5@dowI
�!B,�["��e.!��߳�%%j���nF?�Agҝ��#����29½���ۺ��L��!��Hu��Eޚr]�������Z�"z��.�������(����9�Z��4��aQ�.?�I��}b���<�y`F��uɾ�pϧ�<:�ǣ���V�-�服5��=�
��U,�8e�{&f~�\
�ol����4}]Z{2��d���^0��O�i@&�Y�����;�z.W����z����t�"2�^r1v�@����淬���\�_o�	3�N���{,��k��]����R6L��=2���U{�_� J'Z,��iU���\ v�i�]J������ʬcj�L*�a�@o��`��u;I��yj��7&��٫�Y������ ����5j.�|��z�G�6�Ȩχ+IH�����#��]uh����d�)�p�z�U����S�'N�*U����ҽu�Q��Y�Xa��}?72'�</a�#�Mu�p֕��ne%���(�I?	���}5вU��x\����NX���GT�$���)y����E�}�/�B��/us"ɫr
��a{��?��uA�g5��[�Q���يyNgijlRU��e���q�����ցN�x��_�C>�����n���2�V}�D�'�}����řВ�ܡ1?����7�^������˅�ď�e�ZN:�����T�G�]�z�,�S��>4��D����i`���Q�d��B╾���7q��w>�e��:�K��Q1]�λyKg ��]1 W)g��1<R/�c����#��h��!i7��х�P�6���aHtߦ _� �	,�x��њɪq�Ky)Fh�&�G���q��x�¶4\�M�IV�%��(d����`G��H����kD��\��8� 5�L�Q���wHr5kE�u�ݣ��r��=P��Ga�+�jx����E�7��Κ�Epȼ��͖"�]� ��Ϲ����[�px�NM#�l��B�ȩ��N�P�U�v�JpsK�Z�hiћ��|����⋗k���6;}����!}��U[$*�i)�pFC����8p�c��k��j��|7D���ܾs�J��
i�l�W��a,���P�t2�H��  �urIc�*jXuyŘ��]�c���bH�ϒ�3Ȉb�Y +!�e����pS��(������5a�a�2��`��cۮx��+h���ǩ�~z�O3��m �z������f�����X3֡�e�1�fu�K�R	�vt3x�-9�R�ёEQ�N�3M�"�����Z22NF�d{�v���[I���6s{�<����Y|#�Ez/<s�!���q-8�)���ô�Q|�1��p��?��ҖT144]�c(2QU�<��Ƌd�B_,rbB"O��ܟ��])����5�������Oz�fTS\)�x���!�L�:<�qo��$h5t���	Q�&�V+�X_30��efJz���?Tx4�d�c�I����?�*����D� �Z��g�S�/�)��mب��,;b��5�6Gu*��ע^�0���fA�o��
�Ns�k����/T�,Ќ�]6�@�PN���'���{
�-�	�4h�l�~�U����R��Q��Y���ņ�h
������s�!|��q�Cv�
�ʇB��ƾl���#�Ɂ8���퀠��	o�3����ז=��G�6y���~P�3���RL�n2ʲJ�)�=&;��<����� �}}�/	{����Ц��6����ߧK$硴L��FWt�II��jS���[L�QG��w�3���9F����4C���`�m�fzr��D����g��8oR�T$�N���չ��W�r�0�<�q�������I�� �ƕM	ՙ�%���?�h�E[�2dZdpR��M(�
B^G	�:x|������r콙a��r�{�vJ���k�?@�57�}̫��{��o^ȝǈ����q��k��:60��-P������y=�i~��֋���:_�bV�NH0ϙ��K��� �7��$���!ʭ��2��s������q��[7�٠3�Nl�{��W��^�S�m]�B�Wې�pL�:��"oM����gwC��c�A=�a�iM~Q��Vw��e��@-o�N
���~��$��>���}�<0#GѺd�k8��SC��Q�ED�ȖKs���ɞzv��*P���=3�p.�R�7�?�`�DL��.�=�?~2��o/�Ɗ�'�4 ����~�ݝc=�+�PP�|=�������j:T�A/� �;\ ��og�[���T.vί�J��P'En�=�@�5��.�R`�?)�|����ܪ,       

            transitionFill: function(barWidth) {

                var toolTipOffset = barWidth - toolTip.width();
                fill.css( methods.getTransition(barWidth, settings.duration, 'width'));
                toolTip.css( methods.getTransition(toolTipOffset, settings.duration, 'left'));

            },	

            animateFill: function(barWidth) {
                var toolTipOffset = barWidth - toolTip.width();
                fill.stop().animate({width: '+=' + barWidth}, settings.duration);
                toolTip.stop().animate({left: '+=' + toolTipOffset}, settings.duration);
            }
			
        };
        
        if (methods[options]) { 	// $("#element").pluginName('methodName', 'arg1', 'arg2');
            return methods[options].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof options === 'object' || !options) { 	// $("#element").pluginName({ option: 1, option:2 });
            return methods.init.apply(this);  
        } else {
            $.error( 'Method "' +  method + '" does not exist in barfiller plugin!');
        } 
    };

})(jQuery);