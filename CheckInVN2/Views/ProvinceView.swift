//
//  ProvinceView.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct ProvinceView: View {
    @StateObject var provinceModel = ViewModel()
    @State private var selectedProvinceId: Int?
    
    var body: some View {
        NavigationView{
            List {
                ForEach(provinceModel.provinces, id: \.id) { province in
                    NavigationLink(
                        destination: FamousPlace(id_province: province.id),
                        label: {
                            HStack{
                                province.imageA
                                    .resizable()
                                    .frame(width: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, height: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, alignment: .center)
                                Text(province.provinceName)
                            }
                            
                        })
                }
            }
            .navigationBarTitle("Tỉnh Thành")
            .onAppear{
                provinceModel.fetchProvince()
            }
        }
       
    }
}

struct ProvinceView_Previews: PreviewProvider {
    static var previews: some View {
        ProvinceView()
    }
}
