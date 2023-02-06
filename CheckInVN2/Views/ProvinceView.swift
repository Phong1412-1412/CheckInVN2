//
//  ProvinceView.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct ProvinceView: View {
    @StateObject var provinceModel = ViewModel()
    var body: some View {
        NavigationView{
            List{
                ForEach(provinceModel.provinces, id: \.self) {
                    province in
                    HStack {
                        province.imageA
                            .resizable()
                            .frame(width: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, height: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, alignment: /*@START_MENU_TOKEN@*/.center/*@END_MENU_TOKEN@*/)
                        Text(province.provinceName)
                    }
                }
            }
            .navigationTitle("Tỉnh Thành")
            .onAppear {
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
