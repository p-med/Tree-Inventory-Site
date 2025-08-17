# -*- coding: utf-8 -*-
"""
Created on Sun Aug 17 11:17:11 2025

@author: pmedi
"""
import pandas as pd
import pdfplumber

file = r"C:\Users\pmedi\Downloads\gtr_nrs200-2023_appendix11.pdf"
wood_density = []
with pdfplumber.open(file) as pdf:
       for page in pdf.pages:
           tables = page.extract_tables()
           for table in tables:
               wood_density.append(table)
               
species = []
density = []
for i in wood_density:
    for e in i:
        if e[0] != "Scientific Name":
            species.append(e[0])
            density.append(float(e[1]))
            
            
density_dict = dict(zip(species, density))

wood_density_df = pd.DataFrame(
    {'species': species,
     'density': density,
    })

