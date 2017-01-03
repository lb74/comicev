import os, Image

def next_count(mon):
	base = '0123456789abcdefghijklmnopqrstuvwxyz'
	k = list(mon)
	i = len(k) - 1
	nex = 1
	while nex:
		nexvt = base.index(k[i]) + nex
		k[i] = base[nexvt % len(base)]
		if nexvt == len(base):
			nex = 1
			i -= 1
		else:
			nex = 0
	return ''.join(k)
#VCO -> Comic Viet
#ECO -> Comic Eng
#CHP -> Chap
#IMG -> Image of chap
#TYP -> Type of comic
def create_code(typ, lag, mon):
	if typ == "comic":
		if lag == "en":
			code = "eco" + next_count(mon)
		else:
			code = "vco" + next_count(mon)
	elif typ == "chap":
		code = "chp" + next_count(mon)
	elif typ == 'image':
		code = "img" + next_count(mon)
	else:
		code = 'typ' + next_count(mon)
	return code
name = create_code('comic', 'vn', "000")
for filename in os.listdir('.'):
    if not "py" in filename:
        name = create_code('comic', 'vn', name[3:6])
        os.rename(filename, name + ".png")