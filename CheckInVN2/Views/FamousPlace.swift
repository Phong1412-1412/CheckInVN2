//
//  ProvinceRow.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct FamousPlace: View {
    @StateObject var FamousModel = ViewModel()
    var id_province: Int
        var body: some View {
            NavigationView {
                List {
                    ForEach(FamousModel.placeIdProvince , id:\.id)
                    {
                        famous in
                        NavigationLink(
                            destination: FamousPlaceDetail(famousPlace: famous),
                            label: {
                                HStack {
                                    famous.imageName
                                        .resizable()
                                        .frame(width: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, height: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/)
                                    VStack {
                                        Text(famous.name)
                                            .font(/*@START_MENU_TOKEN@*/.title/*@END_MENU_TOKEN@*/)
                    
                                        Text(famous.address)
                                            
                                    }
                                    
                      
                                }
                            })
                    }
                    
                }
                .navigationTitle("Địa Danh")
                .onAppear{
                    FamousModel.fetchFamousPost(with: id_province)
                }
            }
            
            .navigationBarTitleDisplayMode(.inline)
    }
}

struct FamousPlace_Previews: PreviewProvider {
    static var previews: some View {
        FamousPlace(id_province: 1)
    }
}

